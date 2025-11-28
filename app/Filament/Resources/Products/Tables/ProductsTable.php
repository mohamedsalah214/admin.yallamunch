<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Image'),
                TextColumn::make('name.ar')->label('الاسم (AR)')->sortable(),
                TextColumn::make('name.en')->label('Name (EN)')->sortable(),
                TextColumn::make('price')->money('usd')->sortable(),
                TextColumn::make('category.name->en')->label('Category'),
                IconColumn::make('status')->boolean()->label('Active'),
                TextColumn::make('created_at')->dateTime()->label('Created'),
            ])
            // ->actions([
            // Tables\Actions\EditAction::make(),
            // Tables\Actions\DeleteAction::make(),
            // ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
