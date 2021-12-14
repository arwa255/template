function fonction()
{
    var nom = f.nom.value;
    var desc_pro = f.desc_pro.value;
    var valeur = f.valeur.value;
    var PA_Promo = f.PA_Promo.value;

    if(nom.length ==0 ||  desc_pro.length ==0 || valeur.length ==0 || PA_Promo.length ==0 )
    {
        alert("veuillez verifier votre données");
    } else
    if(nom.length<3)
    {
        alert("votre nom doit contenir au minimum 3 caractéres");
    } 
    
    else if(desc_pro.length<10)
    {
        alert("votre description doit contenir au minimum 10 caractéres");
        
    }
    else if(valeur.length<1)
    {
        alert("votre valeur doit contenir au minimum 1 chiffre");
    }
    else if(PA_Promo.length<1)
    {
        alert("votre promotion doit contenir au minimum 1 chiffre");
    }
    
   
   
}