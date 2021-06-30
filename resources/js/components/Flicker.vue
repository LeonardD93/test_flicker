<template> 
<div>
    sono qua
    <button @click="refresh()" class="btn btn-primary">Aggiorna</button>
    <table class="table table-striped">
        <thead>
            <tr>             
                <td>immagine</td>
                <td>Titolo</td>
                <td>Sttotitolo</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="elem in data" :key="elem.id">
                
                <td>
                    <img :src="elem.media"  />
                </td>
                <td>
                   {{elem.title}} 
                </td>
                <td>
                     {{ localDate( elem.date_taken)   }}                   
                </td>
                <td>
                    <button @click="openDDetail(elem.id)" class="btn btn-primary">Dettagli</button>               
                </td>      
            </tr>
          
        </tbody>
    </table>
    </div>
</template>
<script>
    export default{
        props:{
        
        },
        data(){
            return {
                data:null
            }
        },
        created() {
            this.refresh();
        },
        methods: {
            refresh(){
                axios.get('/api/flicker')
                .then((res) =>{                   
                    this.data=res.data.data;
                })
                .catch( function(e) {
                    alert(e);
                });
            },
            openDetail(id){

            },
            localDate(date){
                return new Date(date).toLocaleString();
            }

        },
        // computed: {
        //     data(){

        //     }
        // }
    }
</script>