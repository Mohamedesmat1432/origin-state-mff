<?php

namespace App\Helpers;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
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
        $imageExts = self::availableExtensionsImageOnly();

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
            'isImage' => in_array($extension, self::availableExtensionsImageOnly()),
            'isPdf' => $extension === 'pdf',
        ];
    }

    public static function getFilePreviewDetails(TemporaryUploadedFile|string|null $file = null): ?array
    {
        if (!$file) return null;

        try {
            $isTemporary = $file instanceof TemporaryUploadedFile;

            // Check file existence
            if ($isTemporary && !$file->exists()) {
                logger()->warning('Temporary file does not exist.', ['file' => $file]);
                return null;
            }

            if (!$isTemporary && is_string($file) && !Storage::disk('public')->exists($file)) {
                logger()->warning('Stored file does not exist.', ['file' => $file]);
                return null;
            }

            // Prepare file name and extension
            $fileName = $isTemporary
                ? Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension()
                : basename($file);

            $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (!$extension) return null;

            // Determine URL
            $fileUrl = $isTemporary && in_array($extension, self::availableExtensionsFiles())
                ? $file->temporaryUrl()
                : asset('storage/' . ltrim($file, '/'));

            return [
                'extension' => $extension,
                'fileName' => $fileName,
                'fileUrl' => $fileUrl,
                'iconUrl' => self::getFileIcon($extension),
                'isImage' => in_array($extension, self::availableExtensionsImageOnly()),
                'isPdf' => $extension === 'pdf' && !$isTemporary,
            ];
        } catch (\Throwable $e) {
            logger()->error('File preview error', [
                'message' => $e->getMessage(),
                'file' => $file,
            ]);
            return null;
        }
    }


    /**
     * File type icons.
     */
    private static function getFileIcon(string $extension): string
    {
        return match ($extension) {
            'pdf' => asset('icons/icon-pdf.png'),
            'doc', 'docx', 'odt' => asset('icons/icon-word.png'),
            'xls', 'xlsx', 'csv' => asset('icons/icon-excel.png'),
            default => asset('icons/icon-file.png'),
        };
    }

    /**
     * Supported image extensions.
     */
    private static function availableExtensionsImageOnly(): array
    {
        return ['png', 'jpg', 'jpeg', 'gif', 'webp'];
    }

    private static function availableExtensionsFiles(): array
    {
        return ['png', 'jpg', 'jpeg', 'gif', 'webp', 'xlsx', 'xls', 'doc', 'docx', 'odt', 'csv', 'pdf'];
    }

    /**
     * Supported video extensions.
     */
    private static function availableVideoExtensions(): array
    {
        return ['mp4', 'mov', 'avi', 'mkv'];
    }
}
