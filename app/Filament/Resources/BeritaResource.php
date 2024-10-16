<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Filament\Resources\BeritaResource\RelationManagers;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Berita';
    protected static ?string $activeNavigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Master';
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('users_id')
                    ->default(auth()->id()),
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'Pendidikan' => 'Pendidikan',
                        'Penghargaan' => 'Penghargaan',
                        'Event' => 'Event',
                    ])
                    ->required(),
                Forms\Components\RichEditor::make('deskripsi')
                ->label('Deskripsi')
                ->required()
                ->toolbarButtons([
                    'bold',
                    'italic',
                    'underline',
                    'strike',
                    'link',
                    'bulletList',
                    'orderedList',
                    'blockquote',
                    'codeBlock',
                    'redo',
                    'undo',
                ])
                ->placeholder('Tulis deskripsi berita...'),
                Forms\Components\FileUpload::make('image')
                    ->label('Foto Berita')
                    ->image()
                    ->directory('uploads/berita')
                    ->visibility('public'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto Berita'),
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('users.name')
                    ->label('Pengupload')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
    public static function getModelLabel(): string
    {
        return __('Berita');
    }

    public static function getPluralLabel(): string
    {
        return __('Berita');
    }
}
