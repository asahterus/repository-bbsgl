@extends('layouts.guest')
@section('content')
    <div class="container my-5">
      <div class="stepper">
        <!-- Step 1 -->
        <button type="button" class="btn btn-light border">Type</button>
        <div class="step-line"></div>
        <!-- Step 2 -->
        <button type="button" class="btn btn-light border">Upload</button>
        <div class="step-line"></div>
        <!-- Step 3 -->
        <button type="button" class="btn btn-primary">Details</button>
        <div class="step-line"></div>
      
        <button type="button" class="btn btn-light border">Subjects</button>
        <div class="step-line"></div>
      
        <button type="button" class="btn btn-light border">Deposit</button>
      </div>

      <div class="direction-btn d-flex align-items-center justify-content-center my-5 gap-5">
        <a href="{{ route('upload.upload') }}" class="text-decoration-none bg-warning rounded border-0 text-white p-2" style="width: 150px">
          < Previous
        </a>
        
        <button class="bg-warning rounded border-0 text-white p-2" style="width: 150px">
          Save and Return
        </button>

        <button class="bg-warning rounded border-0 text-white p-2" style="width: 150px">
          Cancel
        </button>

        <button id="nextButton" class="bg-warning rounded border-0 text-white p-2" style="width: 150px">
          Next >
        </button>
      </div>

      {{-- Item Type --}}
      <div id="item-type" class="rounded p-3 mx-5">
        <div class="row">
          <div class="col-10 mx-auto">

            <form id="detailsForm" action="{{ route('storeDetails') }}" method="post">
              @csrf   
           

            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Title</p>
                <p  class="mb-0">?</p>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <textarea name="title" class="form-control" id="title" rows="3"></textarea>
                </div>     
              </div>
            </div>

            <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Abstract</p>
                <p  class="mb-0">?</p>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <textarea name="abstract" class="form-control" id="abstract" rows="3"></textarea>
                </div>     
              </div>
            </div>

            <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Creators</p>
                <p  class="mb-0">?</p>
              </div>
              <div class="card-body">
                <div id="creators-list">
                  <div class="creator-input row mb-2">
                    <div class="col-md-1 d-flex align-items-center justify-content-center">
                      <p class="mb-0">1.</p>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" name="family_name[]" placeholder="Family Name">
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control" name="given_name[]" placeholder="Given Name / Initials">
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" name="nim[]" placeholder="NIP">
                    </div>
                    <div class="col-md-3">
                      <input type="email" class="form-control" name="email[]" placeholder="Email">
                    </div>
                  </div>
                </div>
                
                <div class="ms-2 my-2">
                  <button id="add-row" class="btn btn-primary">More input rows</button>
                </div>
              </div>
            </div>

            <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Corporate Creators</p>
                <p  class="mb-0">?</p>
              </div>
              <div class="card-body">
                <div id="corporate-creators-list">
                  <div class="creator-input row mb-2">
                    <div class="col-md-1 d-flex align-items-center justify-content-center">
                      <p class="mb-0">1.</p>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="corporate-creators[]">
                    </div>
                   
                  </div>
                </div>
                
                <div class="ms-2 my-2">
                  <button id="add-row-corporate-creators" class="btn btn-primary">More input rows</button>
                </div>
              </div>
            </div>

            <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Contributors</p>
                <p  class="mb-0">?</p>
              </div>
              <div class="card-body">
                <div id="contributors-list">
                  <div class="contributor-input row mb-2">
                    <div class="col-md-1 d-flex align-items-center justify-content-center">
                      <p class="mb-0">1.</p>
                    </div>
                    <div class="col-md-3">
                      <div class="form-floating">
                        <select class="form-select" name="contribution[]">
                          <option value="" selected>Unspecified</option>
                          <option value="other">Other</option>
                        </select>
                        <label for="contribution">Contribution</label>
                      </div>
                    </div>
                            
                    <div class="col-md-2">
                      <input type="text" class="form-control" name="family_name[]" placeholder="Family Name">
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" name="given_name[]" placeholder="Given Name / Initials">
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" name="nim[]" placeholder="NIP">
                    </div>
                    <div class="col-md-2">
                      <input type="email" class="form-control" name="email[]" placeholder="Email">
                    </div>
                  </div>
                </div>
                
                <div class="ms-2 my-2">
                  <button id="add-row-contributors" class="btn btn-primary">More input rows</button>
                </div>
              </div>
            </div>

            <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Divisions</p>
                <p class="mb-0">?</p>
              </div>
              <div class="card-body">
                <div id="divisions-list">
                  <div class="division-input row mb-2">
                    <div class="col-12">
                      <div class="form-floating">
                        <select class="form-select" name="divisions[]" id="divisions" multiple style="height: 10em">
                          <option value="Survei dan Pemetaan Sumber Daya Geologi Kelautan">Survei dan Pemetaan Sumber Daya Geologi Kelautan</option>
                          <option value="Survei dan Pemetaan Mitigasi Kebencanaan Kekayaan Alam Kelautan">Survei dan Pemetaan Mitigasi Kebencanaan Kewilayahan Kelautan</option>
                          <option value="Other">Other</option>
                  
                        </select>
                        <label for="divisions">Select Divisions</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            

            <div class="card my-3">
              <div class="card-header">
                <h5>Publication Details</h5>
              </div>
              <div class="card-body">

                  <!-- Refereed -->
                  <div class="mb-3">
                    <label class="form-label">Refereed:</label><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="refereed" id="refereedYes" value="yes">
                      <label class="form-check-label" for="refereedYes">Yes, this version has been refereed.</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="refereed" id="refereedNo" value="no">
                      <label class="form-check-label" for="refereedNo">No, this version has not been refereed.</label>
                    </div>
                  </div>
          
                  <!-- Status -->
                  <div class="mb-3">
                    <label class="form-label">Status:</label><br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="published" value="published">
                      <label class="form-check-label" for="published">Published</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="inPress" value="in_press">
                      <label class="form-check-label" for="inPress">In Press</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="submitted" value="submitted">
                      <label class="form-check-label" for="submitted">Submitted</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" id="unpublished" value="unpublished">
                      <label class="form-check-label" for="unpublished">Unpublished</label>
                    </div>
                  </div>
          
                  <!-- Journal or Publication Title -->
                  <div class="mb-3">
                    <label for="journalTitle" class="form-label">Journal or Publication Title:</label>
                    <input type="text" class="form-control" id="journalTitle" name="journal_title">
                  </div>
          
                  <!-- ISSN -->
                  <div class="mb-3">
                    <label for="issn" class="form-label">ISSN:</label>
                    <input type="text" class="form-control" id="issn" name="issn">
                  </div>
          
                  <!-- Publisher -->
                  <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher:</label>
                    <input type="text" class="form-control" id="publisher" name="publisher">
                  </div>
          
                  <!-- Official URL -->
                  <div class="mb-3">
                    <label for="officialUrl" class="form-label">Official URL:</label>
                    <input type="url" class="form-control" id="officialUrl" name="official_url">
                  </div>
          
                  <!-- Volume -->
                  <div class="mb-3">
                    <label for="volume" class="form-label">Volume:</label>
                    <input type="text" class="form-control" id="volume" name="volume">
                  </div>
          
                  <!-- Number -->
                  <div class="mb-3">
                    <label for="number" class="form-label">Number:</label>
                    <input type="text" class="form-control" id="number" name="number">
                  </div>
          
                  <!-- Page Range -->
                  <div class="mb-3 row">
                    <label class="form-label">Page Range:</label>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="From" name="page_from">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" placeholder="To" name="page_to">
                    </div>
                  </div>
          
                  <!-- Date -->
                  <div class="mb-3">
                    <label class="form-label">Date:</label>
                    <div class="row g-2">
                      <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Year" name="year">
                      </div>
                      <div class="col-md-4">
                        <select class="form-select" name="month">
                          <option value="unspecified">Unspecified</option>
                          <option value="january">January</option>
                          <option value="february">February</option>
                          <option value="march">March</option>
                          <option value="april">April</option>
                          <!-- Add other months -->
                        </select>
                      </div>
                      <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Day" name="day">
                      </div>
                    </div>
                  </div>
          
                  <!-- Date Type -->
                  <div class="mb-3">
                    <label class="form-label">Date Type:</label><br>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="date_type" id="unspecified" value="unspecified">
                      <label class="form-check-label" for="unspecified">UNSPECIFIED</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="date_type" id="publication" value="publication">
                      <label class="form-check-label" for="publication">Publication</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="date_type" id="submission" value="submission">
                      <label class="form-check-label" for="submission">Submission</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="date_type" id="completion" value="completion">
                      <label class="form-check-label" for="completion">Completion</label>
                    </div>
                  </div>
          
                  <!-- Identification Number -->
                  <div class="mb-3">
                    <label for="identificationNumber" class="form-label">Identification Number:</label>
                    <input type="text" class="form-control" id="identificationNumber" name="identification_number">
                  </div>
          
                  <!-- Related URLs -->
                  <div class="mb-3">
                    <label for="relatedUrls" class="form-label">Related URLs:</label>
                    <div id="related-urls-container">

                      <div class="input-group mb-2">
                        <input type="url" class="form-control" id="relatedUrls" name="related_urls[]">
                      <select class="form-select" name="url_type[]">
                        <option value="unspecified">UNSPECIFIED</option>
                        <option value="type1">Type 1</option>
                        <option value="type2">Type 2</option>
                        <!-- Add more types -->
                      </select>
                    </div>
                    </div>
                    <button type="button" id="add-related-urls" class="btn btn-primary mt-2">More input rows</button>
                  </div>
          
              </div>
            </div>


            <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Funders</p>
                <p class="mb-0">?</p>
              </div>
              <div class="card-body">
                <div id="funders-list">
                  <div class="funders-input row mb-2">
                    <div class="col-md-1 d-flex align-items-center justify-content-center">
                      <p class="mb-0">1.</p>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="funders[]">
                    </div>
                  </div>
                </div>
                <div class="ms-2 my-2">
                  <button id="add-row-funders" class="btn btn-primary">More input rows</button>
                </div>
              </div>
            </div>
        
            <!-- Projects Card -->
            <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Projects</p>
                <p class="mb-0">?</p>
              </div>
              <div class="card-body">
                <div id="projects-list">
                  <div class="projects-input row mb-2">
                    <div class="col-md-1 d-flex align-items-center justify-content-center">
                      <p class="mb-0">1.</p>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="projects[]">
                    </div>
                  </div>
                </div>
                <div class="ms-2 my-2">
                  <button id="add-row-projects" class="btn btn-primary">More input rows</button>
                </div>
              </div>
            </div>
        
            <!-- Contact Email Address Card -->
            <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Contact Email Address</p>
                <p class="mb-0">?</p>
              </div>
              <div class="card-body">
                <input type="email" class="form-control" name="contact-email" placeholder="Enter email">
              </div>
            </div>
        
            <!-- References Card -->
            <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">References</p>
                <p class="mb-0">?</p>
              </div>
              <div class="card-body">
                <textarea class="form-control" name="references" rows="3" placeholder="Enter references"></textarea>
              </div>
            </div>
        
            <!-- Uncontrolled Keywords Card -->
            <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Uncontrolled Keywords</p>
                <p class="mb-0">?</p>
              </div>
              <div class="card-body">
                <input type="text" class="form-control" name="keywords" placeholder="Enter keywords">
              </div>
            </div>


             <!-- Additional Card -->
             <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Additional Information</p>
                <p class="mb-0">?</p>
              </div>
              <div class="card-body">
                <textarea class="form-control" name="additional_information" rows="3" placeholder="Enter Additional Information"></textarea>
              </div>
            </div>


             <!-- Comments and Suggestions Card -->
             <div class="card my-3">
              <div class="card-header d-flex align-items-center justify-content-between mb-0">
                <p class="mb-0">Comments and Suggestions</p>
                <p class="mb-0">?</p>
              </div>
              <div class="card-body">
                <textarea class="form-control" name="comments" rows="3" placeholder="Enter Comments and Suggestions"></textarea>
              </div>
            </div>
        
   
          </form>

          </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        let creatorCount = 1,corporateCreatorCount = 1, contributorCount = 1;

        // Function to add more input rows
        $('#add-row').click(function(e) {
            e.preventDefault();
            creatorCount++;
            $('#creators-list').append(`
                <div class="creator-input row mb-2">
                    <div class="col-md-1 d-flex align-items-center justify-content-center">
                        <p class="mb-0">${creatorCount}.</p>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="family_name[]" placeholder="Family Name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="given_name[]" placeholder="Given Name / Initials">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="nim[]" placeholder="NIP">
                    </div>
                    <div class="col-md-3">
                        <input type="email" class="form-control" name="email[]" placeholder="Email">
                    </div>
                </div>
            `);
        });

        $('#add-row-corporate-creators').click(function(e) {
            e.preventDefault();
            corporateCreatorCount++;
            $('#corporate-creators-list').append(`
                <div class="creator-input row mb-2">
                    <div class="col-md-1 d-flex align-items-center justify-content-center">
                        <p class="mb-0">${corporateCreatorCount}.</p>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="corporate-creators[]" placeholder="">
                    </div>
                   
                </div>
            `);
        });

        $('#add-row-contributors').click(function(e) {
            e.preventDefault();
            contributorCount++;
            $('#contributors-list').append(`
                <div class="contributor-input row mb-2">
                    <div class="col-md-1 d-flex align-items-center justify-content-center">
                      <p class="mb-0">${contributorCount}</p>
                    </div>
                    <div class="col-md-3">
                      <div class="form-floating">
                        <select class="form-select" name="contribution[]">
                          <option value="" selected>Unspecified</option>
                          <option value="other">Other</option>
                        </select>
                        <label for="contribution">Contribution</label>
                      </div>
                    </div>
                            
                    <div class="col-md-2">
                      <input type="text" class="form-control" name="family_name[]" placeholder="Family Name">
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" name="given_name[]" placeholder="Given Name / Initials">
                    </div>
                    <div class="col-md-2">
                      <input type="text" class="form-control" name="nim[]" placeholder="NPM">
                    </div>
                    <div class="col-md-2">
                      <input type="email" class="form-control" name="email[]" placeholder="Email">
                    </div>
                  </div>
            `);
        });

        $("#add-related-urls").click(function(e) {
          e.preventDefault();
          var newInputRow = `
              <div class="input-group mb-2">
                  <input type="url" class="form-control" name="related_urls[]">
                  <select class="form-select" name="url_type[]">
                      <option value="unspecified">UNSPECIFIED</option>
                      <option value="type1">Type 1</option>
                      <option value="type2">Type 2</option>
                  </select>
              </div>`;
          $("#related-urls-container").append(newInputRow);
      });

      $("#add-row-funders").click(function(e) {
      e.preventDefault();
      var rowCount = $("#funders-list .funders-input").length + 1;
      var newInputRow = `
        <div class="funders-input row mb-2">
          <div class="col-md-1 d-flex align-items-center justify-content-center">
            <p class="mb-0">` + rowCount + `.</p>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control" name="funders[]">
          </div>
        </div>`;
      $("#funders-list").append(newInputRow);
    });

    // Add more input rows for "Projects"
    $("#add-row-projects").click(function(e) {
      e.preventDefault();
      var rowCount = $("#projects-list .projects-input").length + 1;
      var newInputRow = `
        <div class="projects-input row mb-2">
          <div class="col-md-1 d-flex align-items-center justify-content-center">
            <p class="mb-0">` + rowCount + `.</p>
          </div>
          <div class="col-md-9">
            <input type="text" class="form-control" name="projects[]">
          </div>
        </div>`;
      $("#projects-list").append(newInputRow);
    });
    });

   
    $('#nextButton').click(function(e) {
      document.getElementById('detailsForm').submit();
    })
 

</script>
@endpush
