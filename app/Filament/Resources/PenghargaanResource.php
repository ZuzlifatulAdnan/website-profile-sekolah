<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenghargaanResource\Pages;
use App\Filament\Resources\PenghargaanResource\RelationManagers;
use App\Models\Penghargaan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenghargaanResource extends Resource
{
    protected static ?string $model = Penghargaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static ?string $navigationLabel = 'Penghargaan';
    protected static ?string $activeNavigationIcon = 'heroicon-o-trophy';
    protected static ?string $navigationGroup = 'Master';
    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('users_id')
                    ->default(auth()->id()),
                Forms\Components\TextInput::make('judul')
                    ->label('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->label(label: 'Foto Penghargaan')
                    ->image()
                    ->directory('uploads/penghargaan')
                    ->visibility('public'),
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
                    ->placeholder('Tulis deskripsi Penghargaan...'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto '),
                Tables\Columns\TextColumn::make('judul')
                    ->label('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('users.name')
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
            'index' => Pages\ListPenghargaans::route('/'),
            'create' => Pages\CreatePenghargaan::route('/create'),
            'edit' => Pages\EditPenghargaan::route('/{record}/edit'),
        ];
    }
    public static function getModelLabel(): string
    {
        return __(key: 'Penghargaan');
    }

    public static function getPluralLabel(): string
    {
        return __('Penghargaan');
    }
}
