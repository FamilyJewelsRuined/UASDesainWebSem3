<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentNewestResource\Pages;
use App\Models\PaymentNewest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PaymentNewestResource extends Resource
{
    protected static ?string $model = PaymentNewest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Payments';

    // Simplified form with minimal field
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                    ->label('Payment Amount')
                    ->required()
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('payment_date')
                    ->label('Payment Date')
                    ->required(),
            ]);
    }

    // Simplified table with basic column
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable()
                    ->label('ID'),
                Tables\Columns\TextColumn::make('amount')
                    ->sortable()
                    ->label('Payment Amount'),
                Tables\Columns\TextColumn::make('payment_date')
                    ->sortable()
                    ->label('Payment Date'),
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
            // Add any relations if needed in future
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentNewests::route('/'),
            'create' => Pages\CreatePaymentNewest::route('/create'),
            'edit' => Pages\EditPaymentNewest::route('/{record}/edit'),
        ];
    }
}
