<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VidioResource\Pages;
use App\Filament\Resources\VidioResource\RelationManagers;
use App\Models\Vidio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VidioResource extends Resource
{
    protected static ?string $model = Vidio::class;
    protected static ?string $navigationIcon = 'heroicon-s-play-circle';
    protected static ?string $navigationLabel = 'Video';
    protected static ?string $activeNavigationIcon = 'heroicon-s-play-circle';
    protected static ?string $navigationGroup = 'Master';
    protected static ?int $navigationSort = 19;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->label('Url')
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
            'index' => Pages\ListVidios::route('/'),
            'create' => Pages\CreateVidio::route('/create'),
            'edit' => Pages\EditVidio::route('/{record}/edit'),
        ];
    }
}
