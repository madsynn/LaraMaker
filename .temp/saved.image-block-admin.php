

    <table id="product-review" class="table ">
        <thead>
        <tr>
            <th style="min-width:100px"><strong>Preview</strong>  </th>
            <th style="min-width:150px"><strong>Label</strong> </th>
            <th><strong>Main image</strong>  </th>
            <th><strong>Thumbnail</strong>  </th>
            <th><strong>Gallery</strong>  </th>
            <th class="text-center"><strong>Actions</strong> </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="width:20%">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 300px; height: 300px;">
                        <img src="http://www.placehold.it/300x300/EFEFEF/AAAAAA?text=no+image" alt="">
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 300px; line-height: 20px;"></div>
                    <div>
                    <span class="btn btn-light-grey btn-file">
                    <span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span>
                    <span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
                        {!! Form::file('thumbnail', null, array('class'=>'form-control', 'id' => 'thumbnail', 'value'=>Input::old('thumbnail'))) !!}
                    </span>
                        <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                            <i class="fa fa-times"></i> Remove
                        </a>
                    </div>
                </div>
            </td>
            <td>
                {!! Form::label('alt', 'Image Title:') !!}
            </td>
            <td>


                        {!! Form::checkbox('field', 1, true,  ['data-toggle' => 'toggle']) !!}

            </td>

            <td>

                    <label class="checkbox-inline">
                    <input type="checkbox" name="product1-main" value="" class="square-blue" > Use Main Image
                    </label>

            </td>
            <td>

                    <label class="checkbox-inline">
                    <input type="checkbox" name="product1-main" value="" class="square-blue"> Use Thumbnail
                    </label>

            </td>
            <td>

                    <label class="checkbox-inline">
                    <input type="checkbox" name="product1-main" value="" class="square-blue"> Use in Gallery
                    </label>

            </td>
            <td class="text-center">
                <a href="#" class="delete-img btn btn-sm btn-default m-t-10"><i class="fa fa-times-circle"></i> Remove</a>
            </td>
        </tr>
    </tbody>
    </table>