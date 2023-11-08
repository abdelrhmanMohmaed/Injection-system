<div class="direct-chat-contacts" style="border-radius: 10%;">
    <div v-for="plan in item.plans" class="text-center padding-class" v-if="item.plans[0]" style=" margin-top: 5px;">
        <div v-if="plan.missing <= 0 && plan.missing != null"  style="text-decoration-line: line-through !important;" >
            <div>
                <span class="btn btn-xs label-success">PN: @{{ plan.part.part_no }}</span>

                <span class="btn btn-xs label-success">D: @{{ plan.demand }}</span>

                <span class="btn btn-xs label-success">P: @{{ plan.priority }}</span>

                <span class="btn btn-xs label-success">W: @{{ plan.week }}</span>
            </div>
        </div>
        <div v-else>
            <div>
                <span class="btn btn-xs label-warning">PN: @{{ plan.part.part_no }}</span>

                <span class="btn btn-xs label-warning">D: @{{ plan.demand }}</span>

                <span class="btn btn-xs label-warning">P: @{{ plan.priority }}</span>

                <span class="btn btn-xs label-warning">W: @{{ plan.week }}</span>
            </div>
        </div>
    </div>
</div>
