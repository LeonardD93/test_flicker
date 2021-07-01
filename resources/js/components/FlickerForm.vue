<template>
    <form @submit.prevent="save"> 
        <input type="hidden" name="_token" :value="this.$csrfToken">
        <table>
            <thead>
                <tr>             
                    <td>Campo</td>
                    <td>Valore</td>
                </tr>
            </thead>
            <tbody>
                <tr v-if="form.id" hidden>
                    <td>ID </td>
                    <td>
                        <input   v-model="form.id"/>
                    </td>
                </tr>
                <tr>
                    <td>title</td>
                    <td>
                        <input   v-model="form.title"/>
                    </td>
                </tr>
                <tr>
                    <td>link</td>
                    <td>
                        <input   v-model="form.link"/>
                    </td>
                </tr>
                <tr>
                    <td>media</td>
                    <td>
                        <input   v-model="form.media"/>
                    </td>
                </tr>
                <tr>
                    <td>date_taken</td>
                    <td>
                        <input   v-model="form.date_taken"/>
                    </td>
                </tr>
                 <tr>
                    <td>description</td>
                    <td>
                        <input   v-model="form.description"/>
                    </td>
                </tr>
                 <tr>
                    <td>published</td>
                    <td>
                        <input   v-model="form.published"/>
                    </td>
                </tr>
                 <tr>
                    <td>author</td>
                    <td>
                        <input   v-model="form.author"/>
                    </td>
                </tr>
                <tr>
                    <td>author_id</td>
                    <td>
                        <input   v-model="form.author_id"/>
                    </td>
                </tr>
                <tr>
                    <td>tags</td>
                    <td>
                        <input   v-model="form.tags"/>
                    </td>
                </tr>

            </tbody>
        </table>
        <button class="text-center" type="submit">Salva</button>
    </form>
</template>
<script>
 export default{
        props:{
            detail:{
                type: Object,
               
            }
        },
        data(){
            return {
                form: null
            }
        },
        created(){
            console.log(this.detail)
            if(!this.detail){
                this.form={
                    title:null,
                    link:null,
                    media:null,
                    data_taken:null,
                    description:null,
                    published:null,
                    author:null,
                    author_id:null,
                    tags:null
                }
            }
            else{
                this.form=this.detail
            }
        },
        methods:{
             save(){
                 var link='/api/flicker'
                 console.log(this.form)
                 axios.post(link, this.form)
                .then((res) =>{
                    this.$emit.close
                    console.log(res.data)               
                    // this.data=res.data.data;
                })
                .catch( function(e) {
                    alert(e);
                });
            }
        }
 }
</script>
