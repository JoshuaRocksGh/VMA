<!-- Modal -->
<div class="modal fade" id="faq_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document" style="wid">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary font-18 font-weight-bold">Help</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-4">
                @include('pages.faq.faqs')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>