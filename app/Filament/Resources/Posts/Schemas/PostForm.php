<?php


namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Textarea::make('content')
                    ->label('Content')
                    ->rows(6)
                    ->required(),

                TextInput::make('author')
                    ->required()
                    ->maxLength(100),

                FileUpload::make('thumbnail')
                    ->disk('public')
                    ->label('Upload Thumbnail')
                    ->helperText('Ukuran disarankan 1200x600 px. Format: JPG, PNG.')
                    ->image()
                    ->directory('thumbnails'),


                Toggle::make('is_published')
                    ->label('Published')
                    ->default(true),
            ]);
    }
}

