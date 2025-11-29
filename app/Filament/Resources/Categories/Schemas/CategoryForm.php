<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Filament\Forms\Components\Select;

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
                    ->disk('main_site')            // مهم: يخزن على disk ده
                    ->image()
                    ->visibility('public')
                    ->maxSize(5048)
                    // عندما يعرض حالة موجودة (edit), نحوّل قيمة الحقل إلى URL كامل للعرض
                    ->getUploadedFileUrlUsing(function (?string $state) {
                        if (! $state) {
                            return null;
                        }

                        // لو المخزون هو URL كامل، رجّعه كما هو
                        if (Str::startsWith($state, ['http://', 'https://'])) {
                            return $state;
                        }

                        // لو المخزون هو المسار النسبي، ارجع URL من ال-disk اللي عرفناه
                        if (Storage::disk('main_site')->exists($state)) {
                            return Storage::url('main_site/' . $state);
                        }

                        // fallback: حاول تبني الـ URL بناءً على config
                        return Config::get('filesystems.disks.main_site.url') . '/' . ltrim($state, '/');
                    })
                    // (اختياري) لو عايز تمنع استبدال الملف لما تعمل edit بلا قصد:
                    ->preserveFilenames(), // أو بحسب تفضيلك
                Toggle::make('status')
                    ->label('Active')
                    ->default(true),
            ]);
    }
}
