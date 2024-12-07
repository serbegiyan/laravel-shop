<?php

namespace App\Filament\Resources\RefryResource\Pages;

use App\Filament\Resources\RefryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefry extends EditRecord
{
    protected static string $resource = RefryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
