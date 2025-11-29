<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Tabs::make('Language Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('English')->schema([
                            TextInput::make('name.en')
                                ->label('Name (English)')
                                ->required(),
                            Textarea::make('description.en')
                                ->label('Description (English)'),
                        ]),
                        Tab::make('العربية')->schema([
                            TextInput::make('name.ar')
                                ->label('الاسم بالعربية')
                                ->required(),
                            Textarea::make('description.ar')
                                ->label('الوصف بالعربية'),
                        ]),
                    ]),
                TextInput::make('slug')
                    ->label('Slug')
                    ->unique(ignoreRecord: true)
                    ->required(),
                FileUpload::make('image')
                    ->label('Category Image')
                    ->directory('categories')
                    ->disk('main_site')
                    ->image()
                    ->visibility('public')
                    ->maxSize(5048),
                Toggle::make('status')
                    ->label('Active')
                    ->default(true),
            ]);
    }
}
