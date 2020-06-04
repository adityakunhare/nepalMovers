<template>
    <b-card>
        <b-form @submit="formSubmit">
                <b-form-group label="First name">
                    <b-form-input v-model="form.first_name" name="first_name" placeholder="Enter first name"></b-form-input>
                </b-form-group>
            <b-form-group label="Last name">
                <b-form-input v-model="form.last_name" name="last_name" placeholder="Enter last name"></b-form-input>
            </b-form-group>
            <b-button type="submit" variant="primary">Submit</b-button>

        </b-form>
    </b-card>
</template>
<script lang="ts">
export default {
    data() {
        return {
            form :{}
        }
    },
    methods: {
        formSubmit(e){
            e.preventDefault();
            console.log(this.form)
            axios.get('api/save',this.form).then(res=>{
                console.log(res)
            }).catch(res=>{

            });
        }
    },
}
</script>
