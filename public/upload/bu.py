from requests import get
from bs4 import BeautifulSoup
import re
import sys

spec_key_store=[]
spec_val_store=[]
review_store=[]
fake_review=[]
garbage = 0


def Remove(duplicate):
    final_list = []
    for num in duplicate:
        if num not in final_list:
            final_list.append(num)
    return final_list

def get_specs(xxx):
    #url = 'https://www.aliexpress.com/item/FeiyuTech-Vimble-2-Feiyu-3-Axis-Handheld-Smartphone-Gimbal-Stabilizer-with-183mm-Pole-Tripod-for-iPhone/32856199831.html?s=p&ws_ab_test=searchweb0_0%2Csearchweb201602_2_10152_10065_10151_10344_10068_10869_10342_10868_10343_10340_10059_10341_10696_100031_10084_10083_10103_10618_10624_10307_10623_10622_10621_10620%2Csearchweb201603_44%2CppcSwitch_5_ppcChannel&priceBeautifyAB=0'
    #print (url)
    url = ''+xxx+''
    response = get(url)
    html_soup = BeautifulSoup(response.text, 'html.parser')

    # Taking feature names
    specs_key = html_soup.find_all('span',{"class": "propery-title"})
    l = len(specs_key)


    abc = [] 
    for val in specs_key:
        #print(val.text)
        str = val.text.lower()
        #print(str)
        abc = re.split(' |,|:|/',str)
        try :
            for x in abc :
                #print(x)
                if len(x) < 4:
                    abc.remove(x)
            try :
                abc.remove("&")
                abc.remove("\n")
                abc.remove("")
            except :
                #print("no bogas value")
                garbage = 0
            for i in abc :
                if len(i)>3 :
                    spec_key_store.append(i)
                else :
                    #print("not inserted - >",i)
                    garbage = 0
        except :
            garbage = 0


#Taking feature values
    
    specs_val = html_soup.find_all('span',{"class": "propery-des"})
    
    for val in specs_val:
        #print(val.text)
        str = val.text.lower()
        #print(str)
        abc = re.split(' |,|:|/',str)
        try :

            for x in abc :
                #print(x)
                if len(x) < 4:
                    abc.remove(x)
            try :
                abc.remove("&")
                abc.remove("\n")
                abc.remove("")
            except :
                #print("no bogas value")
                grabage = 0
        #print(abc)
            for i in abc :
                if len(i)>3 :
                    spec_key_store.append(i)
                else :
                    #print("not inserted - >",i)
                    garbage = 0
        except :
            garbage = 0
            
    
    # insert common words
    spec_key_store.append("ship")
    spec_key_store.append("excellent") 
    spec_key_store.append("material") 
    spec_key_store.append("good quality") 
    spec_key_store.append("deliver") 
    spec_key_store.append("better than")
    spec_key_store.append("bad quality")  
    spec_key_store.append("standard")
    spec_key_store.append("expensive") 
    spec_key_store.append("cheap")
    spec_key_store.append("cost") 
    


#spec_key_store = Remove(spec_key_store)


#for i in spec_key_store:
#    print (i)

#Opening review tab  

       
    iframe = html_soup.find('iframe')
    str = "https:"+iframe.attrs['thesrc']+""
    response_review = get(str)
    review_soup = BeautifulSoup(response_review.text, 'html.parser')

# Storing reviews
    reviews = review_soup.find_all('dt',{"class": "buyer-feedback"})
 
    for val in reviews:
        #print(val.text.lower())
        review_store.append(val.text.lower())

#get_reviews()
    review_l = len(review_store)
    l = len(spec_key_store)

    # matching keys to reviews
    res = []
    #print("No of reviews ",review_l)
    count = 0
    for j in range (0,review_l):
        k_b = 0
        for i in range(0,l):
            k_b = review_store[j].find(spec_key_store[i])
            
            #print(i , k_b)
            if k_b != -1 :
                #print(spec_key_store[i],"->",review_store[j],k_b) 
                count = count + 1
                res.append(1) 
                break
        if k_b == -1  :      
            res.append(0)    
#    print("QQQQQQQQQQQQQQQQQQQQQQQQQQQQ")  
#    print(len(res)) 
            
    for i in range(0,review_l) :
        if res[i] == 0:
            print(i,review_store[i])
            fake_review.append(review_store[i])
     
#validate_reviews()        

def detect(xxx):
	if xxx.find("aliexpress.com/item/") == -1:
		print("Not AliExpress Item")
	else :
		get_specs(xxx)
    #print(xxx)
	#spec_key_store = Remove(spec_key_store)

	#print("not a valid ali express item")
detect(sys.argv[1])
# def addition():
# document.getElementById("result").innerHTML = a+b
# document.getElementById("computebutton").addEventListener("click", addition())
