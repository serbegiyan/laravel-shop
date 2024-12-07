<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SmartphoneResource\Pages;
use App\Filament\Resources\SmartphoneResource\RelationManagers;
use App\Models\Smartphone;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SmartphoneResource extends Resource
{
    protected static ?string $model = Smartphone::class;

    protected static ?string $navigationIcon = '/images/smart.png';

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
                    ->default(3),
                Forms\Components\TextInput::make('brend')
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
                Forms\Components\TextInput::make('shorts')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('color')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('processor')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('speed')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('screen')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('resolution')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('tehnology')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('camera')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('corpus')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('ram')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('memory')
                    ->required()
                    ->numeric(),
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
                Tables\Columns\TextColumn::make('brend')
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
                Tables\Columns\TextColumn::make('shorts')
                    ->searchable(),
                Tables\Columns\TextColumn::make('color')
                    ->searchable(),
                Tables\Columns\TextColumn::make('processor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('speed')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('screen')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('resolution')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tehnology')
                    ->searchable(),
                Tables\Columns\TextColumn::make('camera')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('corpus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ram')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('memory')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListSmartphones::route('/'),
            'create' => Pages\CreateSmartphone::route('/create'),
            'edit' => Pages\EditSmartphone::route('/{record}/edit'),
        ];
    }
}
