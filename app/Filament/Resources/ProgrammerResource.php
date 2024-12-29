<?php

namespace App\Filament\Resources;

use App\Models\Programmer;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class ProgrammerResource extends Resource
{
    protected static ?string $model = Programmer::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog'; // Optional: Choose your icon
    protected static ?string $navigationLabel = 'Programmers'; // Navigation label
    protected static ?string $navigationGroup = 'Admin'; // Group for Admin section

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                
                Forms\Components\TextInput::make('nim')
                    ->label('NIM')
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),

                Forms\Components\FileUpload::make('image')
                    ->label('Picture')
                    ->image()
                    ->directory('programmers')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nim')
                    ->label('NIM'),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(50),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Picture')
                    ->rounded() // Optional: Display rounded images
                    ->height(50) // Optional: Set image height
                    ->width(50), // Optional: Set image width
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\ProgrammerResource\Pages\ListProgrammers::route('/'),
            'create' => \App\Filament\Resources\ProgrammerResource\Pages\CreateProgrammer::route('/create'),
            'edit' => \App\Filament\Resources\ProgrammerResource\Pages\EditProgrammer::route('/{record}/edit'),
        ];
    }
}
