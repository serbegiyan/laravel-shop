<?php

namespace App\Filament\Resources\NoutbookResource\Pages;

use App\Filament\Resources\NoutbookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNoutbooks extends ListRecords
{
    protected static string $resource = NoutbookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
