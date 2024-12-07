<?php

namespace App\Filament\Resources\RefryResource\Pages;

use App\Filament\Resources\RefryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRefries extends ListRecords
{
    protected static string $resource = RefryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
