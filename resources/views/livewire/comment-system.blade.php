@if (session()->has('message'))
    <div class="alert alert-info" role="alert">
        <strong>{{session('message')}}</strong>
    </div>
@endif
<div id="customer" class="tab-content {{ $active ? "active" : null }}">
    <div class="box border">
        <h3>@lang('static.page.customers.customer.comments',['count'=>$comments->count()])</h3>
        @if($comments)
            <div class="panel" id="media-object">
                <div class="panel-body">
                    <ul class="media-list">
                        @foreach($comments->where('top_comment_id',0) as $comment)

                            <li class="media">
                                <a class="pull-left" href="javascript:void(0)">
                                    <i class="fa fa-user fa-4x"></i>
                                </a>
                                @php($message=json_decode($comment->message))
                                <div class="media-body">
                                    <div class="text">
                                        <h3>{{ $message->name }}</h3>
                                        <p class="date">
                                            @php($time=$comment->created_at)
                                            @if(\Illuminate\Support\Facades\App::getLocale()=='az')
                                                @php($time->setLocale('az'))
                                                {{$time->diffForHumans()}}
                                            @elseif(\Illuminate\Support\Facades\App::getLocale()=='en')
                                                @php($time->setLocale('en'))
                                                {{$time->diffForHumans()}}
                                            @elseif(\Illuminate\Support\Facades\App::getLocale()=='ru')
                                                @php($time->setLocale('ru'))
                                                {{$time->diffForHumans()}}
                                            @endif

                                        </p>
                                        <p>{{ $message->description }}</p>
                                        <a
                                            class="reply"
                                            href="javascript:void(0)"
                                            wire:click="reply('{{ $comment->id }}')"
                                            {{-- onclick="reply('{{ $comment->id }}','{{ $message->name }}','{{ $message->description }}');" --}}
                                            >
                                            <i class="fas fa-reply"></i>
                                            @lang('static.form.buttons.reply')
                                        </a>
                                    </div>
                                    <!-- End text -->
                                    @if($comment->get_top_comment)
                                        @foreach($comment->get_top_comment as $children)
                                            <div class="media">
                                                <a class="pull-left" href="javascript:void(0)">
                                                    <i class="fa fa-user fa-4x"></i>
                                                </a>
                                                @php($messageTop=json_decode($children->message))
                                                <div class="media-body">
                                                    <div class="text">
                                                        <h3>{{ $messageTop->name }}</h3>
                                                        <p class="date">
                                                            @php($time=$children->created_at)
                                                                @if(\Illuminate\Support\Facades\App::getLocale()=='az')
                                                                    @php($time->setLocale('az'))
                                                                    {{$time->diffForHumans()}}
                                                                @elseif(\Illuminate\Support\Facades\App::getLocale()=='en')
                                                                    @php($time->setLocale('en'))
                                                                    {{$time->diffForHumans()}}
                                                                @elseif(\Illuminate\Support\Facades\App::getLocale()=='ru')
                                                                    @php($time->setLocale('ru'))
                                                                    {{$time->diffForHumans()}}
                                                                @endif
                                                        </p>
                                                        <p>{{ $messageTop->description }}</p>
                                                        <!-- Nested media object -->
                                                    </div>
                                                    <!-- End text -->
                                                </div>
                                                <!-- Nested media object -->
                                            </div>
                                        @endforeach
                                        <!-- End media-body -->
                                    @endif
                                </div>
                                <!-- End media body -->
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        @else
            <p>@lang('static.page.customers.customer.notHaveComment')</p>
        @endif
    </div>
    <div>
        <div id="replyUser" class="{{ $replyData['active'] ? null : 'hidden' }}" >
            <div class="media">
                <a class="pull-left" href="javascript:void(0)">
                    <i class="fa fa-user fa-4x"></i>
                </a>
                <div class="media-body">
                    <div class="text">
                        <h3>{{ $replyData['active'] ? $replyData['name'] :null }}</h3>
                        <p>{{ $replyData['active'] ? $replyData['message'] :null }}</p>
                        <!-- Nested media object -->
                    </div>
                    <!-- End text -->
                </div>
                <!-- Nested media object -->
            </div>
        </div>
        <form class="form-horizontal" wire:submit.prevent="sendComment">
            <div id="reply"></div>
            <h3>@lang('static.page.customers.customer.addComment')</h3>
            @if (session()->has('message'))
                <div class="alert alert-info" role="alert">
                    <strong>{{session('message')}}</strong>
                </div>
            @endif
            <div class="box">
                @auth()
                    <input type="hidden" value="{{ auth()->user()->name }}" wire:model="formFields.name" />
                    <input type="hidden" value="{{ auth()->user()->email }}" wire:model="formFields.email" />
                @else
                <div class="col-md-6">
                    <div class="form-group">
                        <label class=" control-label" aria-required="true" for="inputName">@lang('static.form.labels.name') *</label>
                        <input wire:model.lazy="formFields.name" type="text"  class="form-control" id="inputName"
                            placeholder="@lang('static.form.labels.name')" />
                            @error('formFields.name') <span
                                class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class=" control-label" aria-required="true" for="inputsumary">@lang('static.form.labels.email') <span
                                class="color">*</span></label>
                        <input type="text" wire:model.lazy="formFields.email" class="form-control" id="inputsumary"
                            placeholder="@lang('static.form.labels.email')" />
                            @error('formFields.email') <span
                                class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                @endauth

            </div>
            <div class="form-group">
                <label class=" control-label" aria-required="true" for="inputReview">@lang('static.form.labels.desc') <span class="color">*</span></label>
                <textarea wire:model.lazy="formFields.description" class="form-control" id="inputReview"></textarea>
                @error('formFields.description') <span
                                class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary" type="submit">@lang('static.form.buttons.shareComment') </button>
        </form>
    </div>
</div>
