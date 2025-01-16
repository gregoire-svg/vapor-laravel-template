<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('legal_name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('alias')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')->email()->required(),
                TextInput::make('trn_number')->required(),
                TextInput::make('trn_url')->required()->url(),
                TextInput::make('trade_licence_number'),
                TextInput::make('trade_licence_url'),
                TextInput::make('trade_licence_expiry_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('legal_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('alias')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('trn_number'),
                Tables\Columns\TextColumn::make('trn_url'),
                Tables\Columns\TextColumn::make('trade_licence_number'),
                Tables\Columns\TextColumn::make('trade_licence_url'),
                Tables\Columns\TextColumn::make('trade_licence_expiry_date'),
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
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
