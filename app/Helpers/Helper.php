<?php

namespace App\Helpers;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Helper
{
    /**
     * Count days between two dates.
     */
    public static function countDays($start, $end): int
    {
        return CarbonImmutable::parse($start)->diffInDays(CarbonImmutable::parse($end), false);
    }

    /**
     * Add months to a date safely.
     */
    public static function addMonthToDate($date, int $count): string
    {
        return CarbonImmutable::parse($date)
            ->addMonthsNoOverflow($count)
            ->timezone('Africa/Cairo')
            ->format('Y-m-d');
    }

    /**
     * Format time as hour:minute am/pm.
     */
    public static function formatHours($date): string
    {
        return $date ? Carbon::parse($date)->timezone('Africa/Cairo')->isoFormat('h:mm a') : '';
    }

    /**
     * Format date as Y-m-d.
     */
    public static function formatDate($date): string
    {
        return $date ? Carbon::parse($date)->timezone('Africa/Cairo')->format('Y-m-d') : '';
    }

    /**
     * Format full date with time.
     */
    public static function formatFullDate($date): string
    {
        return $date ? Carbon::parse($date)->timezone('Africa/Cairo')->isoFormat('Y-m-d h:mm a') : '';
    }

    /**
     * Format date as "Month Year".
     */
    public static function formatDateMonths($date): string
    {
        return $date ? Carbon::parse($date)->timezone('Africa/Cairo')->translatedFormat('F Y') : '';
    }

    /**
     * Get preview information for uploaded or stored file.
     */
    public static function createPreviewDetails(TemporaryUploadedFile|string|null $file = null): ?array
    {
        if (!$file) return null;

        $extension = strtolower($file->getClientOriginalExtension());
        $icon = self::getFileIcon($extension);
        $imageExts = self::availableImageExtensions();

        return [
            'extension' => $extension,
            'fileName' => $file->getClientOriginalName(),
            'fileUrl' => $file->temporaryUrl(now()->addMinutes(10)),
            'iconUrl' => $icons[$extension] ?? asset('icons/icon-file.png'),
            'isPreviewable' => in_array($extension, $imageExts),
        ];
    }


    public static function updatePreviewDetails(TemporaryUploadedFile $file): ?array
    {
        if (!$file) return null;

        $isTemporary = isset($file);
        $extension = strtolower(pathinfo($isTemporary ? $file->getClientOriginalName() : $file, PATHINFO_EXTENSION));

        return [
            'extension' => $extension,
            'fileName' => $isTemporary ? $file->getClientOriginalName() : basename($file),
            'fileUrl' => $isTemporary ? $file->temporaryUrl(now()->addMinutes(10)) : asset('storage/' . $file),
            'iconUrl' => self::getFileIcon($extension),
            'isImage' => in_array($extension, self::availableImageExtensions()),
            'isPdf' => $extension === 'pdf',
        ];
    }

    public static function getFilePreviewDetails(TemporaryUploadedFile|string|null $file = null): ?array
    {
        if (!$file) return null;

        $isTemporary = $file instanceof TemporaryUploadedFile;

        $extension = strtolower(pathinfo($isTemporary ? $file->getClientOriginalName() : $file, PATHINFO_EXTENSION));

        $fileName = $isTemporary? $file->getClientOriginalName(): basename($file);

        if (!$extension) return null;

        $fileUrl = $isTemporary ? $file->temporaryUrl(now()->addMinutes(10)) : asset('storage/' . ltrim($file, '/'));
    
        $icon = self::getFileIcon($extension);

        $checkExt = in_array($extension, self::availableImageExtensions());

        $isImage = $checkExt || ($checkExt && $isTemporary);

        $isPdf = $extension === 'pdf' && !$isTemporary;

        return [
            'extension' => $extension,
            'fileName' => $fileName,
            'fileUrl' => $fileUrl,
            'iconUrl' => $icon,
            'isImage' => $isImage,
            'isPdf' => $isPdf,
        ];
    }

    /**
     * File type icons.
     */
    private static function getFileIcon(string $ext): string
    {
        $icons = [
            'xlsx' => asset('icons/icon-excel.png'),
            'xls' => asset('icons/icon-excel.png'),
            'csv' => asset('icons/icon-excel.png'),
            'pdf' => asset('icons/icon-pdf.png'),
            'doc' => asset('icons/icon-word.png'),
            'docx' => asset('icons/icon-word.png'),
            'odt' => asset('icons/icon-word.png'),
            'png' => asset('icons/icon-file.png'),
            'jpg' => asset('icons/icon-file.png'),
            'jpeg' => asset('icons/icon-file.png'),
            'webp' => asset('icons/icon-file.png'),
            'gif' => asset('icons/icon-file.png'),
        ];

        return $icons[$ext] ?? asset('icons/icon-file.png');
    }

    /**
     * Supported image extensions.
     */
    public static function availableImageExtensions(): array
    {
        return ['png', 'jpg', 'jpeg', 'gif', 'webp'];
    }

    /**
     * Supported video extensions.
     */
    public static function availableVideoExtensions(): array
    {
        return ['mp4', 'mov', 'avi', 'mkv'];
    }
}
