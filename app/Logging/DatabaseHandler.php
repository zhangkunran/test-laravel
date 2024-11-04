<?php
namespace App\Logging;

use App\Models\SqlLog;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;

class DatabaseHandler extends AbstractProcessingHandler
{


    protected function write(LogRecord $record): void
    {
        DB::connection(config('logging.channels.mysql.connection'))
            ->table('sql_log')
            ->insert([
                'user_id' => $record->context['user_id']??0,
                'executed_at' => $record->context['executed_at']??0,
                'sql' => $record->message,
                'error' => $record->context['error']??'',
            ]);
    }
}
