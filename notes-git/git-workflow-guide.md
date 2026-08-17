# Daily Git Workflow Guide

It looks like you and Rajat are currently using two different GitHub accounts/repositories (`Megharaikwar139` and `rajattechdev`). To work together without losing code or getting errors, follow these simple daily steps.

---

> [!TIP]
> **Highly Recommended (The Easy Way):** 
> Instead of using two different repositories, you should add Rajat as a "Collaborator" to your GitHub repository (`Megharaikwar139/new-apju`). Then Rajat can clone your repo directly. If you do this, you BOTH only need to run:
> - **Start of work:** `git pull origin main`
> - **End of work:** `git add .`, `git commit -m "message"`, `git push origin main`.

If you prefer to keep your current setup (Two separate repositories), follow the steps below:

---

## 👩‍💻 For You (Megha)

Since you are bringing Rajat's changes into your main project, your computer needs to sync with both your GitHub and Rajat's GitHub.

### 🌅 Before starting work (Morning)
You need to pull any new work Rajat did last night, as well as any changes you made from another computer.
```bash
# 1. Update your code from your own GitHub
git pull origin main

# 2. Bring in Rajat's latest work
git pull rajat main

# 3. Save Rajat's work to your GitHub so it is safe
git push origin main
```

### 🌃 After making your changes (Evening)
When you finish your code, save it and upload it.
```bash
git add .
git commit -m "Update by Megha: [short description]"
git push origin main
```

---

## 👨‍💻 For Rajat

Rajat needs to make sure he brings YOUR changes into his computer before he starts coding, otherwise his code will overwrite yours.

### ⚠️ One-Time Setup for Rajat
Rajat needs to add your GitHub to his computer so he can download your changes. He only needs to run this **once**:
```bash
git remote add megha https://github.com/Megharaikwar139/new-apju.git
```

### 🌅 Before starting work (Morning)
Rajat must download the latest code from your repository before he types anything.
```bash
# Get Megha's latest code
git pull megha main
```

### 🌃 After making his changes (Evening)
When Rajat finishes his code, he uploads it to his own GitHub.
```bash
git add .
git commit -m "Update by Rajat: [short description]"
git push origin main
```

*(After Rajat does this, you will run your Morning steps to pull his changes!)*

---

> [!WARNING]
> **Golden Rule of Git:** ALWAYS run `git pull` **before** you start modifying files. If you forget to pull and start writing code, you will get "Merge Conflicts" which are annoying to fix!
