<tr x-data="{ modalIsOpen : false }">
    <td> 
        
    @if($saveaccount->type == 1)
       
    <span class="badge badge-success">
        ايداع
    </span>
 
    @else
    <span class="badge badge-danger">
        سحب
    </span>

    @endif

    </td>
    <td>{{$saveaccount->wasl_number}}</td>
    <td> @convert($saveaccount->amount_iqd) </td>
    <td> 
    @convert($saveaccount->amount_usd)
         
    </td>
    <td> {{ $saveaccount->date }} </td>
    <td> {{ $saveaccount->details }} </td>
    <td> {{ $saveaccount->user->name }} </td>    
    @if(config('easy_panel.crud.saveaccount.delete') or config('easy_panel.crud.saveaccount.update'))
        <td>

            @if(config('easy_panel.crud.saveaccount.update'))
                <a href="@route(getRouteName().'.saveaccount.update', ['saveaccount' => $saveaccount->id])" class="btn text-primary mt-1">
                    <i class="icon-pencil"></i>
                </a>
            @endif

            @if(config('easy_panel.crud.saveaccount.delete'))
                <button @click.prevent="modalIsOpen = true" class="btn text-danger mt-1">
                    <i class="icon-trash"></i>
                </button>
                <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                    <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false" >
                        <h5 class="pb-2 border-bottom">{{ __('DeleteTitle', ['name' => __('Saveaccount') ]) }}</h5>
                        <p>{{ __('DeleteMessage', ['name' => __('Saveaccount') ]) }}</p>
                        <div class="mt-5 d-flex justify-content-between">
                            <a wire:click.prevent="delete" class="text-white btn btn-success shadow">{{ __('Yes, Delete it.') }}</a>
                            <a @click.prevent="modalIsOpen = false" class="text-white btn btn-danger shadow">{{ __('No, Cancel it.') }}</a>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
