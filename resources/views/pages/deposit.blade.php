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
        <button type="button" class="btn btn-light border">Details</button>
        <div class="step-line"></div>
        <!-- Step 4 -->
        <button type="button" class="btn btn-light border">Subjects</button>
        <div class="step-line"></div>
        <button type="button" class="btn btn-primary">Deposit</button>
    </div>

    @if(session('message'))
    <div class="alert alert-success col-10 mx-auto my-2">
        {{ session('message') }}
    </div>
    @endif

  
    <form action="{{ route('storeEprint') }}" method="POST" id="eprint-form">
        @csrf
        <div class="direction-btn d-flex align-items-center justify-content-center my-5 gap-5">
            <a href="{{ route('upload.subjects') }}" class="bg-warning rounded border-0 text-white p-2 text-decoration-none" style="width: 150px">
                < Previous
            </a>
            <button type="submit" class="bg-warning rounded border-0 text-white p-2" style="width: 150px">
                Save and Return
            </button>
            <button type="button" class="bg-warning rounded border-0 text-white p-2" style="width: 150px">
                Cancel
            </button>
        </div>

        <div id="deposit" class="row">
            <div class="col-8 mx-auto">
                <p><span class="fw-bold">For work being deposited by its own author</span>: In self-archiving this collection of files and associated bibliographic metadata, I grant BBSPGL Repository the right to store them and to make them permanently available publicly for free on-line. I declare that this material is my own intellectual property and understand that BBSPGL Repository does not assume any responsibility if there is any breach of copyright in distributing these files or metadata. (All authors are urged to prominently assert their copyright on the title page of their work.)</p>

                <p><span class="fw-bold">For work being deposited by someone other than its author</span>: I hereby declare that the collection of files and associated bibliographic metadata that I am archiving at BBSPGL Repository is in the public domain. If this is not the case, I accept full responsibility for any breach of copyright that distributing these files or metadata may entail.</p>

                <p>Clicking on the deposit button indicates your agreement to these terms.</p>

                <div class="d-flex align-items-center justify-content-center my-5 gap-5">
                    <button type="submit" class="bg-warning rounded border-0 text-white p-2" style="width: 150px">
                        Deposit Item Now
                    </button>
                    <button type="button" class="bg-orange rounded border-0 text-white p-2" style="width: 150px">
                        Save for Later
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- End of content section --}}
@endsection
