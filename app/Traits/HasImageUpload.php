<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

trait HasImageUpload
{
    use WithFileUploads;

    /**
     * Store a new image file.
     *
     * @param $image
     * @param string $folder
     * @return string
     */
    protected function storeImage($image, string $folder = 'uploads'): string
    {
        return $image->store($folder, 'public');
    }

    /**
     * Store or update an image file.
     *
     * @param $newImage
     * @param string|null $oldImagePath
     * @param string $folder
     * @return string|null
     */
    protected function updateImage($newImage, ?string $oldImagePath, string $folder = 'uploads'): ?string
    {
        if ($newImage) {
            if ($oldImagePath) {
                $this->deleteImage($oldImagePath);
            }
            return $this->storeImage($newImage, $folder);
        }

        return $oldImagePath;
    }

    /**
     * Delete a single image.
     *
     * @param string|null $imagePath
     * @return void
     */
    protected function deleteImage(?string $imagePath): void
    {
        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    /**
     * Bulk delete multiple images.
     *
     * @param array $imagePaths
     * @return void
     */
    protected function bulkDeleteImages(array $imagePaths): void
    {
        $filtered = array_filter($imagePaths, function ($path) {
            return $path && Storage::disk('public')->exists($path);
        });

        if (!empty($filtered)) {
            Storage::disk('public')->delete($filtered);
        }
    }
}
