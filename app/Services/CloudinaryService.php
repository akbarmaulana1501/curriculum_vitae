<?php
namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class CloudinaryService
{
    public function upload(UploadedFile $file, string $folder): string
    {
        $cloud = config('services.cloudinary.cloud_name');
        $key = config('services.cloudinary.api_key');
        $secret = config('services.cloudinary.api_secret');
        if (! $cloud || ! $key || ! $secret) throw new RuntimeException('Konfigurasi Cloudinary belum lengkap.');
        $timestamp = time();
        $signature = sha1("folder={$folder}&timestamp={$timestamp}{$secret}");
        $response = Http::asMultipart()->post("https://api.cloudinary.com/v1_1/{$cloud}/image/upload", [
            ['name'=>'file','contents'=>fopen($file->getRealPath(), 'rb')],
            ['name'=>'api_key','contents'=>$key], ['name'=>'timestamp','contents'=>(string)$timestamp],
            ['name'=>'folder','contents'=>$folder], ['name'=>'signature','contents'=>$signature],
        ]);
        if ($response->failed() || ! $response->json('secure_url')) throw new RuntimeException('Upload ke Cloudinary gagal.');
        return $response->json('secure_url');
    }
}
