<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoutbookResource\Pages;
use App\Filament\Resources\NoutbookResource\RelationManagers;
use App\Models\Noutbook;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NoutbookResource extends Resource
{
    protected static ?string $model = Noutbook::class;

    protected static ?string $navigationIcon = '/images/nout.png';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('category_id')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('shorts')
                    ->required()
                    ->maxLength(200),
                Forms\Components\TextInput::make('brend')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('battery')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('color')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('image1')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('image2')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('image3')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('processor')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('speed')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('videocard')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('os')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('screen')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('screentype')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('resolution')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('ram')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('ramtype')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('memory')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('memotype')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('variant')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shorts')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brend')
                    ->searchable(),
                Tables\Columns\TextColumn::make('battery')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('color')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('image1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('image2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('image3')
                    ->searchable(),
                Tables\Columns\TextColumn::make('processor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('speed')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('videocard')
                    ->searchable(),
                Tables\Columns\TextColumn::make('os')
                    ->searchable(),
                Tables\Columns\TextColumn::make('screen')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('screentype')
                    ->searchable(),
                Tables\Columns\TextColumn::make('resolution')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ram')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ramtype')
                    ->searchable(),
                Tables\Columns\TextColumn::make('memory')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('memotype')
                    ->searchable(),
                Tables\Columns\IconColumn::make('variant')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNoutbooks::route('/'),
            'create' => Pages\CreateNoutbook::route('/create'),
            'edit' => Pages\EditNoutbook::route('/{record}/edit'),
        ];
    }
}
