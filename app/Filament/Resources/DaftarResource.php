<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarResource\Pages;
use App\Filament\Resources\DaftarResource\RelationManagers;
use App\Models\Daftar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DaftarResource extends Resource
{
    protected static ?string $model = Daftar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required()->label('Nama Lengkap'),
                Forms\Components\TextInput::make('nik')->required()->label('NIK'),
                Forms\Components\TextInput::make('alamat')->required()->label('Alamat'),
                Forms\Components\TextInput::make('no_telepon')->required()->label('No Telepon'),
                Forms\Components\DatePicker::make('tanggal_lahir')->required()->label('Tanggal Lahir'),
                Forms\Components\Select::make('jenis_kelamin')
                    ->required()
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nama')->label('Nama Lengkap')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('nik')->label('NIK')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('alamat')->label('Alamat')->sortable(),
            Tables\Columns\TextColumn::make('no_telepon')->label('No Telepon')->sortable(),
            Tables\Columns\TextColumn::make('tanggal_lahir')->label('Tanggal Lahir')->sortable(),
            Tables\Columns\TextColumn::make('jenis_kelamin')
                ->label('Jenis Kelamin')
                ->formatStateUsing(fn ($state) => $state === 'L' ? 'Laki-laki' : 'Perempuan') // Mengubah state menjadi label
                ->color(fn ($state) => $state === 'L' ? 'success' : 'danger') // Mengubah warna berdasarkan nilai
                ->sortable(),
        ])
        ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDaftars::route('/'),
            'create' => Pages\CreateDaftar::route('/create'),
            'edit' => Pages\EditDaftar::route('/{record}/edit'),
        ];
    }
}
