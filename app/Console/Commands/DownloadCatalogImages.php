<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

#[Signature('catalog:download-images')]
#[Description('Download every image queued by catalog:scrape, skipping files already on disk so an interrupted run can simply be re-run')]
class DownloadCatalogImages extends Command
{
    public function handle(): int
    {
        $queuePath = storage_path('app/catalog/image-queue.json');

        if (! is_file($queuePath)) {
            $this->warn("No image queue found at {$queuePath}. Run `php artisan catalog:scrape` first.");

            return self::SUCCESS;
        }

        $entries = json_decode((string) file_get_contents($queuePath), true) ?: [];

        $downloaded = 0;
        $skipped = 0;
        $failed = [];

        $bar = $this->output->createProgressBar(count($entries));
        $bar->start();

        foreach ($entries as $entry) {
            $destination = $entry['destination'];

            if (is_file($destination) && filesize($destination) > 0) {
                $skipped++;
                $bar->advance();

                continue;
            }

            if ($this->downloadOne($entry['url'], $destination)) {
                $downloaded++;
            } else {
                $failed[] = $entry['url'];
            }

            $bar->advance();
            usleep(150_000);
        }

        $bar->finish();
        $this->newLine(2);

        $this->info("Downloaded: {$downloaded}  Skipped (already on disk): {$skipped}  Failed: ".count($failed));

        foreach ($failed as $url) {
            $this->warn("  Failed: {$url}");
        }

        if ($failed !== []) {
            $this->line('Re-run `php artisan catalog:download-images` to retry only the missing files above.');
        }

        return self::SUCCESS;
    }

    private function downloadOne(string $url, string $destination): bool
    {
        try {
            $response = Http::timeout(60)->retry(2, 500)->get($url);
        } catch (\Throwable) {
            return false;
        }

        if ($response->failed()) {
            return false;
        }

        File::ensureDirectoryExists(dirname($destination));
        file_put_contents($destination, $response->body());

        return true;
    }
}
