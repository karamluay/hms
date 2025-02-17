<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title">{{ __('ListTitle', ['name' => __(\Illuminate\Support\Str::plural('Redirect')) ]) }}</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __(\Illuminate\Support\Str::plural('Redirect')) }}</li>
                    </ul>

                    <div class="row justify-content-between mt-4 mb-4">
                        @if(config('easy_panel.crud.redirect.create'))
                        <div class="col-md-4 right-0">
                            <a href="@route(getRouteName().'.redirect.create')" class="btn btn-success">{{ __('CreateTitle', ['name' => __('Redirect') ]) }}</a>
                        </div>
                        @endif
                        @if(config('easy_panel.crud.redirect.search'))
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" @if(config('easy_panel.lazy_mode')) wire:model.lazy="search" @else wire:model="search" @endif placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-default">
                                        <a wire:target="search" wire:loading.remove><i class="fa fa-search"></i></a>
                                        <a wire:loading wire:target="search"><i class="fas fa-spinner fa-spin" ></i></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td style='cursor: pointer' wire:click="sort('pat_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'pat_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'pat_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('Pat_id') }} </td>
                        <td style='cursor: pointer' wire:click="sort('redirect_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'redirect_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'redirect_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('Redirect_id') }} </td>
                        <td style='cursor: pointer' wire:click="sort('redirect_doctor_id')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'redirect_doctor_id') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'redirect_doctor_id') fa-sort-amount-up ml-2 @endif'></i> {{ __('Redirect_doctor_id') }} </td>
                        <td style='cursor: pointer' wire:click="sort('created_at')"> <i class='fa @if($sortType == 'desc' and $sortColumn == 'created_at') fa-sort-amount-down ml-2 @elseif($sortType == 'asc' and $sortColumn == 'created_at') fa-sort-amount-up ml-2 @endif'></i> {{ __('Created_at') }} </td>
                        
                        @if(config('easy_panel.crud.redirect.delete') or config('easy_panel.crud.redirect.update'))
                        <td>{{ __('Action') }}</td>
                        @endif
                    </tr>

                    @foreach($redirects as $redirect)
                        @livewire('admin.redirect.single', ['redirect' => $redirect], key($redirect->id))
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="m-auto pt-3 pr-3">
                {{ $redirects->appends(request()->query())->links() }}
            </div>

        </div>
    </div>
</div>
