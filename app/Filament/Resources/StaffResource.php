<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'STAFF';
    protected static ?string $activeNavigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Master';
    protected static ?int $navigationSort = 16; 
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama STAFF')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('posisi')
                    ->label('Posisi STAFF')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label('Foto STAFF')
                    ->image(),
                Forms\Components\TextInput::make('email')
                    ->label('Email STAFF')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_telp')
                    ->label('No Telp STAFF')
                    ->tel()
                    ->maxLength(15),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama STAFF')
                    ->searchable(),
                Tables\Columns\TextColumn::make('posisi')
                    ->label('Posisi STAFF')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto STAFF')
                ,
                Tables\Columns\TextColumn::make('email')
                    ->label('Email STAFF')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_telp')
                    ->label('No Telp STAFF')
                    ->searchable(),
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
    public static function getModelLabel(): string
    {
        return __(key: 'STAFF');
    }

    public static function getPluralLabel(): string
    {
        return __('STAFF');
    }
}
