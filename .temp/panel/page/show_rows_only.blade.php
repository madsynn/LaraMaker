<?php $page = \App\Models\Page::find(\Request::input('page_id')); ?>
@foreach($page->rows()->orderBy('order','ASC')->get() as $row)
    <div class="row">
        @foreach($row->columns()->orderBy('order','ASC')->get() as $col)
            <div class="col-sm-{{$col->width}}">
                <div class="panel panel-primary">
                    <div class="panel-body" style="background-color: #eee;height: 150px;text-align:center;">
                        @if($col->snippet_id == 0)
                            <a href="#" col-id="{{$col->id}}" col-width="{{$col->width}}" class="label label-success"
                               id="add_s">Add +</a>
                        @else

                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script>
    </script>
@endforeach