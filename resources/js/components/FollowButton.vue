<template>
    <div v-if="canFollow">
        <button class="btn btn-primary sm" @click="followProfil" v-text="follow"></button>
    </div>
</template>

<script>
    export default{

        props:['userId','follows','authId'],

        data: function(){
            return {
                status: this.follows
            }
        },

        methods:{

            followProfil(){
                axios.post('/follows/' + this.userId)

                    .then(response => {
                        this.status = ! this.status
                    })
                    .catch(errors => {
                        if(errors.response.status===401){
                            window.location='/login';
                        }

                })
            }
        },
        computed: {
            follow(){
                return (this.status) ? 'Ne plus abonné' : 'Abonné';
            },
            canFollow(){
                return parseInt(this.authId) !== parseInt(this.userId);
            }
        }
    }
</script>
