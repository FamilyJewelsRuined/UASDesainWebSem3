<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaketUmrohResource\Pages;
use App\Models\PaketUmroh;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class PaketUmrohResource extends Resource
{
    protected static ?string $model = PaketUmroh::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog'; // You can change the icon here
    protected static ?string $navigationLabel = 'Paket Umroh';
    protected static ?string $navigationGroup = 'Admin';

    // Form for creating or editing Paket Umroh
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            // Paket Name field
            Forms\Components\TextInput::make('nama_paket')
                ->label('Paket Name')
                ->required()
                ->maxLength(100),

            // Description field
            Forms\Components\Textarea::make('deskripsi')
                ->label('Description')
                ->maxLength(255),

            // Price field
            Forms\Components\TextInput::make('harga')
                ->label('Price')
                ->numeric()
                ->required(),

            // Duration (Days) field
            Forms\Components\TextInput::make('durasi_hari')
                ->label('Duration (Days)')
                ->numeric()
                ->required(),

            // Facilities field
            Forms\Components\Textarea::make('fasilitas')
                ->label('Facilities')
                ->maxLength(255),
        ]);
    }

    // Table for listing Paket Umroh
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            // Name of the Paket
            Tables\Columns\TextColumn::make('nama_paket')
                ->label('Paket Name')
                ->searchable(),

            // Price of the Paket
            Tables\Columns\TextColumn::make('harga')
                ->label('Price')
                ->sortable(),

            // Duration of the Paket in days
            Tables\Columns\TextColumn::make('durasi_hari')
                ->label('Duration (Days)')
                ->sortable(),

            // Facilities for the Paket
            Tables\Columns\TextColumn::make('fasilitas')
                ->label('Facilities')
                ->limit(50),
        ])
        ->filters([
            // Filters can be added here if necessary
        ])
        ->actions([
            Tables\Actions\EditAction::make(), // Edit action
            Tables\Actions\DeleteAction::make(), // Delete action
        ]);
    }

    // Pages for Paket Umroh
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaketUmrohs::route('/'),
            'create' => Pages\CreatePaketUmroh::route('/create'),
            'edit' => Pages\EditPaketUmroh::route('/{record}/edit'),
        ];
    }
}
