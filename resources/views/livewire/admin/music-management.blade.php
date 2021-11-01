<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                @if ($showSuccesAdd)
                    <div wire:model="showSuccesAdd"
                        class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span
                            class="alert-text text-white">{{ $newMusic }} {{ __(' was uploaded') }}</span>
                        <button wire:click="$set('showSuccesAdd', false); return;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                @if ($showSuccesUpdate)
                    <div wire:model="showSuccesUpdate"
                        class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span
                            class="alert-text text-white">{{ $updatedMusic }} {{ __(' was updated') }}</span>
                        <button wire:click="$set('showSuccesUpdate', false); return;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                @if ($showSuccesRemove)
                    <div wire:model="showSuccesRemove"
                        class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span
                            class="alert-text text-white">{{ $removedMusic }} {{ __(' was deleted') }}</span>
                        <button wire:click="$set('showSuccesRemove', false); return;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
                <div class="clear">&nbsp;</div>
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Music</h5>
                        </div>
                        <a href="{{ route('music-create') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Upload Music</a>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Title
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Singer
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Path
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Public
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($musics as $music)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $music->id }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $music->title }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $music->singer }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $music->path }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            @if($music->public)
                                            <span class="badge badge-sm bg-gradient-success">Public</span>
                                            @else
                                            <span class="badge badge-sm bg-gradient-danger">Hidden</span>
                                            @endif
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('music-update') }}?id={{$music->id}}" class="mx-3" data-bs-toggle="tooltip"
                                            data-bs-original-title="Edit music">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <a href="{{ route('music-delete') }}?id={{$music->id}}" class="mx-3" data-bs-toggle="tooltip"
                                            data-bs-original-title="Delete music">
                                            <i class="fas fa-trash text-secondary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $musics->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
