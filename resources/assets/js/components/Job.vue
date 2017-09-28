<template>

    <div class='modal-mask'>
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form @submit.prevent="onSubmit" @keydown="form.errors.clear()">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" @click="$emit('close')">&times;</button>
                <h4 class="modal-title">Add/Edit Job</h4>
              </div>

              <div class="modal-body ">
                 
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" v-model="form.name" placeholder='Job Name...'>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" v-model="form.description" placeholder='Job Description...'></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <div class="dropdown " >
                            <button style="width: 200px;" class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown" v-text="statusName">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" >
                                <li v-for="status in statuses">
                                    <a href="#" @click="setStatus(status)"> {{ status.name }} </a>
                                </li>
                            </ul>
                        </div> 
                    </div>

                    <div class="form-group">
                        <label for="pwd">Progress:</label>
                        <range-slider
                            class="slider"
                            min="1"
                            max="100"
                            step="1"
                            v-model="form.progress">
                        </range-slider><label >{{ form.progress }}%</label>
                    </div>


              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-dismiss="modal" @click="$emit('close')">Save</button>
                <button type="button" class="btn bg-default" :disabled="newItem" data-dismiss="modal" @click="onDelete()">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" @click="$emit('close')">Close</button>
              </div>

          </form> 
        </div>

      </div>
    </div>

</template>


<script>

    import RangeSlider from 'vue-range-slider'
    import 'vue-range-slider/dist/vue-range-slider.css'

    export default {
        props: {
            rowData: {
                type: Object,
                required: true
            },
            rowIndex: {
                type: Number
            },
            statuses: {
                type: Array,
                required: true
            }
        },
        data() {
            return {
                url: '/api/jobs',
                newItem: true,
                form: new Form({"id": this.rowData.id , "name": this.rowData.name , "description": this.rowData.description, "status_id": this.rowData.status_id, "progress": this.rowData.progress}),
                statusName: "None",
                sliderValue: 10
            }
        },
        created() {
            
            if (this.rowData.status) {
                this.statusName = this.rowData.status.name
                this.newItem = false
            } else {
                this.statusName = "None Selected"
                this.newItem = true

            }
        },
        components: {
            RangeSlider
        },
        methods: {
            onSubmit() {
                this.form.save(this.url)
                this.$events.fire('update-item', this.rowData.id) 
                this.$emit('close')
            },
            onDelete() {
                var yes = confirm("Deleting this job permanently. Continue?")
                if (yes) {
                    axios.delete(this.url + "/" + this.rowData.id)                 
                }  
                this.$events.fire('update-item', this.rowData.id) 
                this.$emit('close')
            },
            
            setStatus(newStatus) {
                
                if (newStatus.tag == "done") {
                    this.form.progress = 100;
                } 

                this.form.status_id = newStatus.id
                this.statusName = newStatus.name
                
            }

        }
    }
</script>

<style>

    .modal-header {
        background-color: #eeeeee;
        border-radius: 6px 6px 0px 0px;
    }

    .slider {
      /* overwrite slider styles */
        width: 200px;
        padding-top: 10px;
    }
    .range-slider-fill {
        background-color: #2579a9;
    }


</style>
