# student management system project....
from tkinter import *
import sqlite3
from PIL import Image,ImageTk
from tkinter import ttk
from tkinter import messagebox
root = Tk()
db = sqlite3.connect("school.db")
cr = db.cursor()
root.geometry("1350x700+0+0")
# root.resizable(0,0)
root.title("Student Mgt System")

var_name = StringVar()
var_char = StringVar()
var_dur = StringVar()
var_search = StringVar()

def menucourse():
    top = Toplevel(root) # root ka bhee root i.e child root..
    top.geometry("650x350+10+260")
    top.focus()
    # ------------------
    def getrecord(ex):
        txt_name.configure(state="readonly")
        r = course_detail.focus()
        content = course_detail.item(r)
        row = content["values"]
        var_name.set(row[1])
        var_dur.set(row[2])
        var_char.set(row[3])
        txt_desc.delete("1.0",END)
        txt_desc.insert(END,row[4])
    # -------------------
    def add_course():
        try:
            if(var_name.get()==""):
                messagebox.showerror("Error","Enter name please",parent=top)
            else:
                cr.execute("select * from course where cname=?",(var_name.get(),))
                row = cr.fetchone()
                if(row!=None):
                    messagebox.showinfo("Information","value already exist..!",parent=top)
                else:
                    cr.execute("insert into course (cname,cdur,ccharges,cdesc) values(?,?,?,?)",(var_name.get(),var_dur.get(),var_char.get(),txt_desc.get('1.0',END)))
                    db.commit()
                    messagebox.showinfo("Information", "Record inserted..!", parent=top)
                    showcourse()
        except Exception as ex:
            messagebox.showerror("Error", f"Error found due to {ex}", parent=top)
    #     ---------------------------------------------
    def del_course():
           try:
               if(var_name.get()==""):
                   messagebox.showerror("Error","please select a course...!",parent=top)
               else:
                    cr.execute("select * from course where cname=?", (var_name.get(),))
                    row = cr.fetchone()
                    if (row == None):
                        messagebox.showinfo("Information", "no record avaiable..!", parent=top)
                    else:
                        cr.execute("delete from course where cname = ?",(var_name.get(),))
                        db.commit()
                        messagebox.showinfo("Information", "Record Deleted..!", parent=top)
                        showcourse()
           except Exception as ex:
            messagebox.showerror("Error", f"Error found due to {ex}", parent=top)
    # -------------------------------------------------
    def upd_course():
        try:
            if(var_name.get()==""):
                messagebox.showerror("Error","Enter name please",parent=top)
            else:
                cr.execute("select * from course where cname=?",(var_name.get(),))
                row = cr.fetchone()
                if(row==None):
                    messagebox.showinfo("Information","no record available..!",parent=top)
                else:
                    cr.execute("update course set cdur=?,ccharges=?,cdesc=? where cname=?",(var_dur.get(),var_char.get(),txt_desc.get("1.0",END),var_name.get()))
                    db.commit()
                    messagebox.showinfo("Information", "Record Updated..!", parent=top)
                    showcourse()
        except Exception as ex:
            messagebox.showerror("Error", f"Error found due to {ex}", parent=top)
    # -------------------------------------------------
    def clr_course():
        var_name.set("")
        var_dur.set("")
        var_char.set("")
        txt_desc.delete("1.0",END)
        txt_name.configure(state="normal")
    # -------------------------------------------------
    def searchc():
         try:
             cr.execute(f"select * from course where cname like '%{var_search.get()}%'")
             rows = cr.fetchall()
             course_detail.delete(*course_detail.get_children())
             for row in rows:
                 course_detail.insert('',END,values=row)
         except Exception as ed:
            messagebox.showerror(f"Error",f"Found Nothing...!{ed}")
    # -------------------------------------------------
    def showcourse():
        try:
            cr.execute("select * from course")
            rows = cr.fetchall()
            course_detail.delete(* course_detail.get_children())
            for row in rows:
                course_detail.insert('',END,values=row)
        except Exception as e:
            messagebox.showerror("Error",f"Error Found Due To {e} ",parent=top)
    ctitle = Label(top,text="Course Detail",font="Courier 20 normal",bg="black",fg="white",height=50,padx=20,)
    ctitle.place(x=0,y=0,relwidth=1,height=70)

    cname = Label(top,text="Course Name",font="TimesNewRoman 15 normal")
    cname.place(x=10,y=90,height=40)

    duration=Label(top,text="Course Duration",font="TimesNewRoman 15 normal")
    duration.place(x=10,y=140,height=40)

    charges=Label(top,text="Course Charges",font="TimesNewRoman 15 normal")
    charges.place(x=10,y=190,height=40)

    desc=Label(top,text="Course Description",font="TimesNewRoman 15 normal")
    desc.place(x=10,y=240,height=40)

    txt_name = Entry(top,textvariable=var_name,font="Arial 20 normal")
    txt_name.place(x=180,y=90,width=300,height=40)

    txt_dur = Entry(top,textvariable=var_dur,font="Arial 20 normal")
    txt_dur.place(x=180,y=140,width=300,height=40)

    txt_char = Entry(top,textvariable=var_char,font="Arial 20 normal")
    txt_char.place(x=180,y=190,width=300,height=40)

    txt_desc = Text(top,font="Arial 20 normal")
    txt_desc.place(x=180,y=240,width=300,height=80)

    btn_add = Button(top,text="Add",bg="darkviolet",fg="ghostwhite",cursor="hand2",command=add_course)
    btn_add.place(x=10,y=300,height=40,width=100)

    btn_delete = Button(top,text="Delete",bg="maroon",fg="ghostwhite",cursor="hand2",command=del_course)
    btn_delete.place(x=120,y=300,height=40,width=100)

    btn_update = Button(top,text="Update",bg="royalblue",fg="ghostwhite",cursor="hand2",command=upd_course)
    btn_update.place(x=240,y=300,height=40,width=100)

    btn_clear = Button(top,text="Clear",bg="seagreen3",fg="ghostwhite",cursor="hand2",command=clr_course)
    btn_clear.place(x=360,y=300,height=40,width=100)
    # ----------------------
    label_search = Label(top,text="search by course name",font="Courier 20 normal",fg="black")
    label_search.place(x=650,y=90)

    txt_search = Entry(top, textvariable=var_search, font="Arial 20 normal")
    txt_search.place(x=1000, y=90, width=300, height=40)

    btn_search = Button(top, text="Search", bg="seagreen3", fg="ghostwhite", cursor="hand2",command=searchc)
    btn_search.place(x=1300, y=90, height=40, width=100)
    # ------------------
    fr1 = Frame(top,bd=7,relief=RAISED)
    fr1.place(x=650,y=150,height=550,width=680)
    scry = Scrollbar(fr1,orient="vertical")
    scrx = Scrollbar(fr1,orient="horizontal")
    course_detail = ttk.Treeview(fr1,columns=("cid","cname","cdur","ccharges","cdesc"),xscrollcommand=scrx.set,yscrollcommand=scry.set)
    scrx.configure(command=course_detail.xview)
    scry.configure(command=course_detail.yview)
    scrx.pack(side=BOTTOM,fill=X)
    scry.pack(side=RIGHT,fill=Y)

    course_detail.heading("cid",text="Course Id")
    course_detail.heading("cname",text="Course Name")
    course_detail.heading("cdur",text="Course Duration")
    course_detail.heading("ccharges",text="Course Charges")
    course_detail.heading("cdesc",text="Course Description")
    course_detail["show"] = "headings"
    course_detail.column("cid",width=100)
    course_detail.column("cname",width=150)
    course_detail.column("cdur",width=200)
    course_detail.column("ccharges",width=100)
    course_detail.column("cdesc",width=300)
    course_detail.pack(fill=BOTH,expand=1)
    showcourse()
    course_detail.bind("<ButtonRelease-1>",getrecord)




    cfooter=Label(top,text="Thank You Visiting..!\nContact - 2413786",font="Courier 15 normal",bg="black",fg="white")
    cfooter.pack(side=BOTTOM,fill=X)
    top.mainloop()

logo = Image.open("images/images.png")
logo = logo.resize((50,50),Image.ANTIALIAS)
logo = ImageTk.PhotoImage(logo)

title = Label(root,text="Student Management & Result System",font="Courier 20 normal",bg="black",fg="white",image=logo,compound="left",height=50,padx=20,)
title.place(x=0,y=0,relwidth=1)

f1 = LabelFrame(root,bg="skyblue",text="My Menu",font="goudyolsstyle 15 bold",fg="black")
f1.place(x=10,y=100,width=1320,height=120)

b1 = Button(f1,text="Course",font="TimesNewRoman 20 normal",bg="springgreen",fg="black",command=menucourse)
b1.place(x=12,y=5,height=70,width=204)

b2 = Button(f1,text="Course",font="TimesNewRoman 20 normal",bg="springgreen",fg="black",command=menucourse)
b2.place(x=228,y=5,height=70,width=204)

b3 = Button(f1,text="Course",font="TimesNewRoman 20 normal",bg="cornsilk",fg="khaki2",command=menucourse)
b3.place(x=444,y=5,height=70,width=204)

b4 = Button(f1,text="Course",font="TimesNewRoman 20 normal",bg="cornsilk",fg="khaki2",command=menucourse)
b4.place(x=660,y=5,height=70,width=204)

b5 = Button(f1,text="Course",font="TimesNewRoman 20 normal",bg="cornsilk",fg="khaki2",command=menucourse)
b5.place(x=876,y=5,height=70,width=204)

b6 = Button(f1,text="Course",font="TimesNewRoman 20 normal",bg="cornsilk",fg="khaki2",command=menucourse)
b6.place(x=1092,y=5,height=70,width=204)
# -----------------------------------------------------------
student = Image.open("images/grad.jpg")
student = student.resize((920,350),Image.ANTIALIAS) # Image fatay ge nahee..
student = ImageTk.PhotoImage(student)

l1 = Label(root,image=student)
l1.place(x=700,y=250,width=620,height=300)

course = Label(root,text="Course [0]",font="TimesNewRoman 20 normal",bg="aquamarine2",fg="ghostwhite",bd=5,relief=GROOVE) #bd=border
course.place(x=700,y=570,height=70,width=170)

student1 = Label(root,text="Course [0]",font="TimesNewRoman 20 normal",bg="aquamarine2",fg="ghostwhite",bd=5,relief=GROOVE) #bd=border
student1.place(x=920,y=570,height=70,width=170)

result = Label(root,text="Course [0]",font="TimesNewRoman 20 normal",bg="aquamarine2",fg="ghostwhite",bd=5,relief=GROOVE) #bd=border
result.place(x=1150,y=570,height=70,width=170)

footer = Label(root,text="Thank You Visiting..!\nContact - 2413786",font="Courier 20 normal",bg="black",fg="white")
footer.pack(side=BOTTOM,fill=X)

root.mainloop()