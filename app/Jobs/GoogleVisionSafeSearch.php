<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\AnnotateImageRequest;
use Google\Cloud\Vision\V1\BatchAnnotateImagesRequest;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature;
use Google\Cloud\Vision\V1\Feature\Type;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Google\Cloud\Vision\V1\Image as VisionImage;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Queueable;

    private $articleImageId;

    /**
     * Create a new job instance.
     */
    public function __construct($articleImageId)
    {
        $this->articleImageId = $articleImageId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->articleImageId);
        if (!$i) {
            return;
        }

        $image = file_get_contents(storage_path('app/public/' . $i->path));
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credentials.json'));

        $googleVisionClient = new ImageAnnotatorClient();
        $googleImage = new VisionImage(['content' => $image]);

        $googleFeature = new Feature();
        $googleFeature->setType(Type::SAFE_SEARCH_DETECTION);

        $request = new AnnotateImageRequest();
        $request->setImage($googleImage);
        $request->setFeatures([$googleFeature]);

        $batchRequest = new BatchAnnotateImagesRequest();
        $batchRequest->setRequests([$request]);

        $responseBatch = $googleVisionClient->batchAnnotateImages($batchRequest);

        $response = $responseBatch->getResponses();
        $googleVisionClient->close();

        $safeSearchAnnotation = $response[0]->getSafeSearchAnnotation();
        $adult = $safeSearchAnnotation->getAdult();
        $spoof = $safeSearchAnnotation->getSpoof();
        $medical = $safeSearchAnnotation->getMedical();
        $violence = $safeSearchAnnotation->getViolence();
        $racy = $safeSearchAnnotation->getRacy();

        $likeliHoodName = [
            'text-secondary bi bi-circle-fill',
            'text-success bi bi-check-circle-fill',
            'text-success bi bi-check-circle-fill',
            'text-warning bi bi-exlamation-circle-fill',
            'text-warning bi bi-exlamation-circle-fill',
            'text-danger bi bi-dash-circle-fill',
        ];

        $i->adult = $likeliHoodName[$adult];
        $i->spoof = $likeliHoodName[$spoof];
        $i->medical = $likeliHoodName[$medical];
        $i->violence = $likeliHoodName[$violence];
        $i->racy = $likeliHoodName[$racy];
        $i->save();
    }
}
