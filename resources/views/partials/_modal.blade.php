    <!-- Educational Information Edit -->
    <div class="modal fade" id="EducationalInfoEidt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="exampleModalLabel">Eucational Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('update.education', $employee) }}" class="p-5 pt-1" method="post">
                        @csrf
                        <div class="mb-2 form-group">
                            <label for="institution">University/College:</label>
                            <input type="text" id="institution" name="institution" class="form-control" value="{{ $edus->institution }}" required>
                        </div>
                        <div class="row">
                            <div class="mb-2 col-md-6 form-group">
                                <label for="field">Field:</label>
                                <input type="text" id="field" name="field" class="form-control" value="{{ $edus->field }}" required>
                            </div>
                            <div class="mb-2 col-md-6 form-group">
                                <label for="level">{{ __('Level:') }}</label>
                                <select id="level" name="level" class="form-control" required>
                                    <option value="">Select Level</option>
                                    <option value="Msc." {{ $edus->level == 'Msc.' ? 'selected' : '' }}>Msc.</option>
                                    <option value="Phd." {{ $edus->level == 'Phd.' ? 'selected' : '' }}>Phd.</option>
                                    <option value="Bsc." {{ $edus->level == 'Bsc.' ? 'selected' : '' }}>Bsc.</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2 col-md-6 form-group">
                                <label for="graduation">Year of Graduation:</label>
                                <input type="number" id="graduation" name="graduation" class="form-control" value="{{ $edus->year_of_graduation }}" required>
                            </div>
                            <div class="mb-2 col-md-6 form-group">
                                <label for="GPA">GPA:</label>
                                <input type="text" id="GPA" name="GPA" class="form-control" value="{{ $edus->GPA }}" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-center border-0 mb-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Experience Information Edit -->
    <div class="modal fade" id="experienceInfoEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title ms-4" id="exampleModalLabel">Experience Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="" class="p-5 pt-1" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-2 col-6 form-group">
                                <label for="first_name">Company:</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" required>
                            </div>
                            <div class="mb-2 col-6 form-group">
                                <label for="last_name">Possition:</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="mb-2 col-6 form-group">
                                <label for="start_date">Start Date:</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                            </div>
                            <div class="mb-2 col-6 form-group">
                                <label for="end_date">End Date:</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-2 form-group">
                            <label for="description">Description:</label>
                            <textarea type="email" id="description" name="description" class="form-control" rows="3"></textarea>
                        </div>

                </div>
                <div class="modal-footer justify-content-center border-0 mb-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

