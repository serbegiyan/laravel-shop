<?php

namespace App\Filament\Resources\NoutbookResource\Pages;

use App\Filament\Resources\NoutbookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNoutbook extends EditRecord
{
    protected static string $resource = NoutbookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
