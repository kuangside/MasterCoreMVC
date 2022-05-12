
@isset($formID)
    @push('js')
    <style>
        #{{$formID}}{
            position: relative;
        }
        #{{$formID}} .form-group
        {
            display: flex;
            align-items: flex-end;;
        }
        #{{$formID}} .form-group-textarea {
            display: flex;
            align-items: start;
            margin-top: 30px;
        }
        #{{$formID}} .form-group .control-label {
            margin-right: 10px;
            margin-bottom: 0px;
            white-space: nowrap;
        }
        #{{$formID}} .form-group .input-group{
            flex: 1;
            display: flex;
            align-items: flex-end;
        }
        #{{$formID}} .form-group input,
        #{{$formID}} .form-group select,
        #{{$formID}} .form-group textarea {
            flex: 1;
            border: none;
            background: none;
            border-bottom: 1px dashed #333;
            border-radius: 0px;
        }
        #{{$formID}} .form-group .input-group-addon {
            display: none;
        }
        #{{$formID}} .form-group .input-group-addon.form-item-inline {
            display: inline;
            margin-right: 10px;
            margin-bottom: 0px;
            white-space: nowrap;
            background: inherit;
            width: fit-content;
            border: 0px;
        }
        #{{$formID}} .form-group input,
        #{{$formID}} .form-group select{
            font-size: 16px;
            color: blue;
        }
        #{{$formID}} .form-group select{ padding-top: 3px; }
        #{{$formID}} .form-control[disabled], fieldset[disabled] .form-control{ cursor: auto; }
        #{{$formID}} .required-text { display: none; }
        #{{$formID}} .textarea-value{
            border-bottom: 1px dashed #333;
            flex: auto;
            color: blue;
            padding: 0px 12px 6px 12px;
            min-height: 38px;
            white-space: pre-wrap;
            overflow: auto;
        }

    </style>

    <script>
        _helper.loading('#{{$formID}}');

        setTimeout(() => {
            $('#{{$formID}}').find('.select2').each((index, el)=>{
                const formgroup = $(el).closest('.form-group');
                formgroup.append(`<input class="form-control" value="${$(el).find('option:selected').text()}">`);
                $(el).remove();
            })
            $('#{{$formID}}').find('textarea').each((index, el)=>{
                const formgroup = $(el).closest('.form-group');
                formgroup.append(`<div class="textarea-value">${$(el).html()}</div>`);
                $(el).remove();
            })
            $('#{{$formID}}').find('select').each((index, el)=>{
                const formgroup = $(el).closest('.form-group');
                formgroup.append(`<input class="form-control" value="${$(el).find('option:selected').text()}">`);
                $(el).remove();
            })
            $('#{{$formID}}').find('input, textarea, select').prop('disabled', true);
            _helper.stopLoading('#{{$formID}}');
        }, 300);
    </script>
    @endpush
@endif
