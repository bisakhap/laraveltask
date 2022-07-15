@csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title', $event->title)}}" required/>
                @error('title')
                <span class='invalid-feedback'>
                    {{$message}}
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description', $event->description)}}" required/>
                @error('description')
                <span class='invalid-feedback'>
                    {{$message}}
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{old('start_date', $event->start_date)}}" required/>
                @error('start_date')
                <span class='invalid-feedback'>
                    {{$message}}
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{old('end_date',$event->end_date)}}" required/>
                @error('end_date')
                <span class='invalid-feedback'>
                    {{$message}}
                </span>
                @enderror
            </div>
           
    
            <button type="submit" class="btn btn-primary">Submit</button>