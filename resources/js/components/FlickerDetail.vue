<template>
    <div>
       
         <table>
        <thead>
            <tr>             
                <td>Campo</td>
                <td>Valore</td>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(value, index) in detail" :key="index" >
                 <td>{{index}}</td>
                <template v-if="index=='published' || index=='date_taken' || index=='created_at' || index=='updated_at' ">
                    <td> {{ localDate( value)   }}</td>
                </template>
                <template v-else>
                   
                    <td v-html="value"></td>
                </template>
            </tr>
    </tbody>
    </table>
    </div>
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
                data:null
            }
        },
        methods:{
             localDate(date){
                return new Date(date).toLocaleString();
            }
        }
 }
</script>
