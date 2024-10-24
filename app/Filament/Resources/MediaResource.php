<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Filament\Resources\MediaResource\RelationManagers;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationLabel = 'Media';
    protected static ?string $activeNavigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationGroup = 'Master';
    protected static ?int $navigationSort = 10;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('users_id')
                    ->default(auth()->id()),
                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('kategori')
                    ->label('Kategori Media')
                    ->options([
                        'Foto' => 'Foto',
                        'Dokumen' => 'Dokumen',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('file')
                    ->label('File')
                    ->acceptedFileTypes(['application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png'])
                    ->required()
                    ->directory('uploads/media')
                    ->visibility('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori Media')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file')
                    ->label('File')
                    ->label('File')
                    ->formatStateUsing(function ($state) {
                        $fileExtension = pathinfo($state, PATHINFO_EXTENSION);

                        // Check if the file is an image
                        if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                            return '<img src="' . asset('storage/uploads/media/' . $state) . '" width="100" />';
                        }
                        // Check if the file is a document
                        elseif (in_array($fileExtension, ['pdf', 'doc', 'docx'])) {
                            return '<a href="' . asset('storage/uploads/media/' . $state) . '" target="_blank">Preview Document</a>';
                        }

                        return '<a href="' . asset('storage/' . $state) . '" target="_blank">Download File</a>';
                    })
                    ->html(),
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
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
    public static function getModelLabel(): string
    {
        return __(key: 'Media');
    }

    public static function getPluralLabel(): string
    {
        return __('Media');
    }
}
