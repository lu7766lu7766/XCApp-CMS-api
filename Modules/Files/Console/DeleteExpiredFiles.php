<?php

namespace Modules\Files\Console;

use Illuminate\Console\Command;
use Modules\Files\Entities\Files;
use Modules\Files\Service\DeleteFilesService;
use Symfony\Component\Console\Input\InputOption;

class DeleteExpiredFiles extends Command
{
    /**
     * @var string $signature
     */
    protected $name = 'files:delete';
    /**
     * @internal
     * @var string
     */
    protected $description = 'Delete expire files after One Days';

    /**
     * DeleteExpiredFiles constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $deleteService = \App::make(DeleteFilesService::class);
        $fileItems = $deleteService->getExpiredFiles($this->option('day'));
        $this->info('prepare delete:');
        $fileItems->map(function (Files $item) use ($deleteService) {
            try {
                $this->info('stating delete ....');
                $this->info("delete target file ID: " . $item->getKey());
                $this->info('target file storage path : ' . $item->getOriginal('files_storage_path'));
                $result = $deleteService->deleteSourceFiles($item);
                $message = $result ? 'Success' : 'Fail';
            } catch (\Throwable $e) {
                $message = 'Fail. ErrorMsg:' . $e->getMessage();
            }
            $this->info('delete status:' . $message);
        });
        $this->info('finish deleted');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['day', 'D', InputOption::VALUE_OPTIONAL, 'expire days', 1],
        ];
    }
}
