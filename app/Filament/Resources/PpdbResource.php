<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpdbResource\Pages;
use App\Filament\Resources\PpdbResource\RelationManagers;
use App\Models\Ppdb;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Symfony\Contracts\Service\Attribute\Required;

class PpdbResource extends Resource
{
    protected static ?string $model = Ppdb::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';
    protected static ?string $navigationLabel = 'PPDB';
    protected static ?string $activeNavigationIcon = 'heroicon-o-check-badge';
    protected static ?string $navigationGroup = 'Master';
    protected static ?int $navigationSort = 14; 
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('users_id')
                    ->default(auth()->id()),
                Forms\Components\TextInput::make('judul')
                    ->label('Judul PPDB')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\Select::make('kategori')
                    ->label('Kategori PPDB')
                    ->options([
                        'Alur' => 'Alur',
                        'Brosur' => 'Brosur',
                        'Kuota' => 'Kuota',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi PPDB')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar PPDB')
                    ->image()
                    ->directory('uploads/ppdb')
                    ->visibility('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar PPDB')
                ,
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul PPDB')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori PPDB')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Users.name')
                    ->label('Pengupload')
                    ->sortable(),

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
            'index' => Pages\ListPpdbs::route('/'),
            'create' => Pages\CreatePpdb::route('/create'),
            'edit' => Pages\EditPpdb::route('/{record}/edit'),
        ];
    }
    public static function getModelLabel(): string
    {
        return __(key: 'PPDB');
    }

    public static function getPluralLabel(): string
    {
        return __('PPDB');
    }
}
